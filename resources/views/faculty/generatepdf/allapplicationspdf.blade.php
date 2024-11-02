<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Applications Details PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Applications Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>College Branch</th>
                    <th>Total Estimated Income</th>
                    <th>Place of Activity</th>
                    <th>Status</th>
                    <th>File Location</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->name_of_organization }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->start_date }}</td>
                    <td>{{ $application->end_date }}</td>
                    <td>{{ $application->college_branch }}</td>
                    <td>{{ $application->total_estimated_income }}</td>
                    <td>{{ $application->place_of_activity }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->current_file_location }}</td>
                    <td>{{ $application->submission_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
