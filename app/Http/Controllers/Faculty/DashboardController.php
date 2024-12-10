<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\AnnexA;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total applications per month for the current year (all activities)
        $applications = Application::selectRaw('COUNT(*) as total, MONTH(submission_date) as month')
            ->whereYear('submission_date', Carbon::now()->year) // Filter for the current year
            ->groupBy('month')
            ->orderBy('month', 'asc') // Sort by month
            ->get();

        // Get total applications per month for each proposed_activity
        $inCampusApplications = Application::selectRaw('COUNT(*) as total, MONTH(submission_date) as month')
            ->whereYear('submission_date', Carbon::now()->year)
            ->where('proposed_activity', 'in campus')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $offCampusApplications = Application::selectRaw('COUNT(*) as total, MONTH(submission_date) as month')
            ->whereYear('submission_date', Carbon::now()->year)
            ->where('proposed_activity', 'off campus')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $fundRaisingApplications = Application::selectRaw('COUNT(*) as total, MONTH(submission_date) as month')
            ->whereYear('submission_date', Carbon::now()->year)
            ->where('proposed_activity', 'fund raising')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Calculate total applications for the entire year
        $totalApplications = $applications->sum('total');

        // Fill missing months with 0 applications for all activities
        $monthlyData = collect();
        $inCampusData = collect();
        $offCampusData = collect();
        $fundRaisingData = collect();
        
        // Variable to track the max applications
        $maxApplications = 0;
        $maxInCampus = 0;
        $maxOffCampus = 0;
        $maxFundRaising = 0;

        for ($i = 1; $i <= 12; $i++) {
            // Fill for all activities
            $count = $applications->firstWhere('month', $i) ? $applications->firstWhere('month', $i)->total : 0;
            $monthlyData[$i] = $count;
            // Update max value for all activities
            if ($count > $maxApplications) {
                $maxApplications = $count;
            }

            // Fill for in campus activity
            $inCampusCount = $inCampusApplications->firstWhere('month', $i) ? $inCampusApplications->firstWhere('month', $i)->total : 0;
            $inCampusData[$i] = $inCampusCount;
            // Update max value for in campus
            if ($inCampusCount > $maxInCampus) {
                $maxInCampus = $inCampusCount;
            }

            // Fill for off campus activity
            $offCampusCount = $offCampusApplications->firstWhere('month', $i) ? $offCampusApplications->firstWhere('month', $i)->total : 0;
            $offCampusData[$i] = $offCampusCount;
            // Update max value for off campus
            if ($offCampusCount > $maxOffCampus) {
                $maxOffCampus = $offCampusCount;
            }

            // Fill for fund raising activity and ensure whole numbers (casting to int)
            $fundRaisingCount = $fundRaisingApplications->firstWhere('month', $i) ? intval($fundRaisingApplications->firstWhere('month', $i)->total) : 0;
            $fundRaisingData[$i] = $fundRaisingCount;
            // Update max value for fund raising
            if ($fundRaisingCount > $maxFundRaising) {
                $maxFundRaising = $fundRaisingCount;
            }
        }

        // Determine the step size for the y-axis for each chart
        $stepSizeApplications = $this->determineStepSize($maxApplications);
        $stepSizeInCampus = $this->determineStepSize($maxInCampus);
        $stepSizeOffCampus = $this->determineStepSize($maxOffCampus);
        $stepSizeFundRaising = $this->determineStepSizeForFundRaising($maxFundRaising);

        // Fetch applications (annexas) for the current year
        $annexas = AnnexA::selectRaw('COUNT(*) as total, MONTH(created_at) as month, proposed_activity')
            ->whereYear('created_at', Carbon::now()->year) // Filter for the current year
            ->groupBy('month', 'proposed_activity') // Group by month and proposed_activity
            ->orderBy('month', 'asc')
            ->get();

        // Process monthly data, grouping by month and summing up total applications
        $monthlyAnnexaData = $annexas->groupBy('month')->map(function ($item) {
            return $item->sum('total');
        });

        // Ensure all months are represented, filling missing months with 0
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($monthlyAnnexaData[$i])) {
                $monthlyAnnexaData[$i] = 0;
            }
        }

        $totalEvaluation = $annexas->sum('total');

        // Fetch the status counts for the annexas
        $statusCounts = AnnexA::selectRaw('COUNT(*) as total, status')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('status')
            ->get();

        // Initialize the statusData array
        $statusData = [
            'Pending Approval' => 0,
            'Returned' => 0,
            'Approved' => 0,
        ];

        // Populate the statusData array based on the fetched data
        foreach ($statusCounts as $statusCount) {
            $statusData[$statusCount->status] = $statusCount->total;
        }

        // Return the view with all the data
        return view('faculty.auth.dbadmin', compact(
            'totalApplications', 'monthlyData', 'inCampusData', 'offCampusData', 'fundRaisingData',
            'stepSizeApplications', 'stepSizeInCampus', 'stepSizeOffCampus', 'stepSizeFundRaising',
            'monthlyAnnexaData', 'statusData', 'totalEvaluation'
        ));
    }

    // Function to determine the step size based on the max applications count
    private function determineStepSize($maxApplications)
    {
        // Ensure the increments follow your requested logic and round the max to avoid decimals
        $maxApplications = round($maxApplications); // Round to nearest whole number
    
        if ($maxApplications <= 5) {
            return 1; // 0-5 (increments of 1)
        } elseif ($maxApplications <= 10) {
            return 1; // 0-10 (increments of 1)
        } elseif ($maxApplications <= 50) {
            return 10; // 0-50 (increments of 10)
        } elseif ($maxApplications <= 100) {
            return 10; // 0-100 (increments of 10)
        } elseif ($maxApplications <= 1000) {
            return 100; // 0-1000 (increments of 100)
        } else {
            return 200; // For max > 1000, step size could be 200 or more
        }
    }

    private function determineStepSizeForFundRaising($maxFundRaising)
    {
        // Logic for determining the step size based on maxFundRaising value
        if ($maxFundRaising <= 5) {
            return 1; // 0-5 (increments of 1)
        } elseif ($maxFundRaising <= 10) {
            return 1; // 0-10 (increments of 1)
        } elseif ($maxFundRaising <= 50) {
            return 10; // 0-50 (increments of 10)
        } elseif ($maxFundRaising <= 100) {
            return 10; // 0-100 (increments of 10)
        } elseif ($maxFundRaising <= 1000) {
            return 100; // 0-1000 (increments of 100)
        } else {
            return 200; // For max > 1000, step size could be 200 or more
        }
    }
}
