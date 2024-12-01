<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\AnnexA;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register services if necessary
    }

    public function boot(): void
    {
        // Share general notifications with all views for both faculty and organization
        View::composer('*', function ($view) {
            // Get the last seen timestamp from the session
            $lastSeen = session('last_seen_notifications', now()->subYears(10)); // Default to a very old date

            // Fetch all applications for general notifications
            $notifications = AnnexA::all()->map(function ($application) use ($lastSeen) {
                $message = '';

                // Check if any of the project details have changed (excluding comments and status changes)
                $fieldsToCheck = [
                    'email', 'name_of_project', 'start_date', 'end_date', 'requesting_organization',
                    'college_branch', 'representative', 'address', 'contact', 'objectives',
                    'items_to_be_sold', 'item_pieces', 'price_ticket', 'total_estimate_ticket',
                    'other_income', 'income_amount', 'total_estimated_income', 'expenditures', 'amount',
                    'total_budget_expenses_php', 'total_estimated_proceeds', 'utilization_plan',
                    'solicitation', 'coordinator', 'participants', 'president', 'treasurer', 'branch', 'proposed_activity'
                ];

                // Check if project details were modified (excluding comments/status changes)
                foreach ($fieldsToCheck as $field) {
                    if ($application->getOriginal($field) !== $application->{$field}) {
                        $message = "The {$application->requesting_organization} updated a pre-evaluation in FRA";
                        break;
                    }
                }

                // If it's a new submission (created_at equals updated_at)
                if (!$message && $application->created_at == $application->updated_at) {
                    $message = "The {$application->requesting_organization} submitted a pre-evaluation in FRA";
                }

                // Only include notifications that have a message (not empty ones)
                return $message ? [
                    'id' => $application->id,
                    'message' => $message,
                    'time' => $application->created_at->diffForHumans(),
                    'updated_at' => $application->updated_at, // Include updated_at for filtering
                ] : null;
            })
            ->filter(); // Remove any notifications that were not valid (null)

            // Get the logged-in user
            $user = Auth::user();

            if ($user) {
                // Check if the user is Faculty (Admin)
                if ($user->is_admin) {
                    // Faculty notifications: Only show notifications related to project submission or update
                    $facultyNotifications = $notifications->filter(function ($notification) {
                        // Ensure the notification is not related to comments or status changes (excluding "Returned" or "Approved")
                        return !str_contains($notification['message'], 'Returned') &&
                               !str_contains($notification['message'], 'Approved') &&
                               !str_contains($notification['message'], 'commented') &&
                               !str_contains($notification['message'], 'Pending Approval');  // Exclude Pending Approval
                    });

                    // Pass faculty-specific notifications to the view
                    $view->with('notifications', $facultyNotifications);
                    $view->with('newNotificationCount', $facultyNotifications->count());
                }
            }

            // Count all notifications for fallback (to handle the last seen time)
            $view->with('notifications', $notifications);
            $view->with('newNotificationCount', $notifications->filter(function ($notification) use ($lastSeen) {
                return $notification['updated_at'] > $lastSeen;
            })->count());
        });

        // Handle organization-specific notifications: updates made by the organization
        View::composer('*', function ($view) {
            $user = Auth::user();

            if ($user) {
                $lastSeen = session('last_seen_notifications', now()->subYears(10));

                // Organization updates (not Faculty updates)
                $organizationUpdates = AnnexA::where('status', '=', 'Pending Approval') // Excluding approved
                    ->where('updated_at', '>', $lastSeen)
                    ->get()
                    ->map(function ($application) {
                        return [
                            'id' => $application->id,
                            'message' => "The {$application->requesting_organization} updated a pre-evaluation in FRA",
                            'time' => $application->updated_at->diffForHumans(),
                            'updated_at' => $application->updated_at,
                        ];
                    });

                // Add organization updates to faculty notifications
                $allNotifications = collect($view->getData()['notifications']);
                $allNotifications = $allNotifications->merge($organizationUpdates);

                // Filter to avoid duplicates or irrelevant notifications
                $facultyNotifications = $allNotifications->filter(function ($notification) {
                    return !str_contains($notification['message'], 'Returned') &&
                           !str_contains($notification['message'], 'Approved') &&
                           !str_contains($notification['message'], 'commented');
                });

                // Pass updated faculty notifications to the view
                $view->with('notifications', $facultyNotifications);
                $view->with('newNotificationCount', $facultyNotifications->count());
            }
        });

        // Handle notifications specific to faculty actions (status changes or comments)
        View::composer('*', function ($view) {
            if (Auth::check()) { // Ensure the user is authenticated
                $userOrganization = Auth::user()->name_of_organization; // Get the organization of the logged-in user

                // Get the last seen time from session (default to a very old date if not set)
                $lastSeen = session('last_seen_notifications', now()->subYears(10));

                // Fetch applications for the logged-in user's organization (status changes or faculty comments)
                $notifications = AnnexA::where('requesting_organization', $userOrganization)
                    ->whereIn('status', ['Returned', 'Approved']) // Fetch both 'Returned' and 'Approved'
                    ->orderBy('updated_at', 'desc')
                    ->get()
                    ->map(function ($application) {
                        $statusMessage = $application->status == 'Approved'
                            ? "Faculty Approved your application"
                            : "Faculty Returned your application"; // Generate the notification message based on status

                        // Check if the comment field is not empty (since it's a JSON field)
                        if (!empty($application->comment)) {
                            // If there are comments, append the message
                            $statusMessage .= " and commented on your application";
                        }

                        return [
                            'id' => $application->id,
                            'message' => $statusMessage,
                            'time' => $application->updated_at->diffForHumans(),
                            'updated_at' => $application->updated_at, // Store updated_at for comparison
                        ];
                    });

                // Exclude notifications for updates made by the organization itself
                $notifications = $notifications->filter(function ($notification) {
                    return !str_contains($notification['message'], 'The organization updated');
                });

                // Count notifications that are newer than the last seen time
                $newNotifications = $notifications->filter(function ($notification) use ($lastSeen) {
                    return $notification['updated_at'] > $lastSeen;
                });

                // Define new_notifications_count based on the filtered notifications
                $new_notifications_count = $newNotifications->count();

                // Pass organization-specific notifications and new notifications count to the view
                $view->with('organization_notifications', $notifications);
                $view->with('new_notifications_count', $new_notifications_count);
            } else {
                // If the user is not authenticated, pass empty values
                $view->with('organization_notifications', []);
                $view->with('new_notifications_count', 0);
            }
        });
    }
}
