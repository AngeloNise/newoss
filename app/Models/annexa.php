<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnexA extends Model // Class name is consistent with convention
{
    use HasFactory;

    protected $table = 'annexas';

    protected $fillable = [
        'email',
        'name_of_project',
        'start_date',
        'end_date',
        'requesting_organization',
        'college_branch',
        'representative',
        'address',
        'contact',
        'objectives',
        'items_to_be_sold',
        'item_pieces',
        'price_ticket',
        'total_estimate_ticket',
        'other_income',
        'income_amount',
        'total_estimated_income',
        'expenditures',
        'amount',
        'total_budget_expenses_php',
        'total_estimated_proceeds',
        'utilization_plan',
        'solicitation',
        'coordinator',
        'participants',
        'president',
        'treasurer',
        'branch',
        'proposed_activity',
        'status',
    ];

    // Define the relationship with Frasuggestion
    public function suggestions()
    {
        return $this->hasMany(Frasuggestion::class, 'application_id'); // Ensure 'application_id' matches your foreign key in Frasuggestion
    }

    public static function notifOrNot()
    {
        // Fetch recent entries (e.g., last 7 days)
        return self::where('updated_at', '>=', now()->subDays(7))
                ->orderBy('updated_at', 'desc')
                ->get()
                ->map(function($annexa) {
                    // Create a custom message for each notification
                    return [
                        'id' => $annexa->id, // Include the ID
                        'message' => "{$annexa->requesting_organization} submitted a pre-evaluation in FRA",
                        'time' => $annexa->updated_at->diffForHumans(), // Use the original time calculation
                    ];
                });
    }
}
