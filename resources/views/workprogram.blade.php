<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Work Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Work Program</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Objective</th>
                    <th>Location</th>
                    <th>Planned Date</th>
                    <th>Actual Date</th>
                    <th>Funding Source</th>
                    <th>Planned Budget</th>
                    <th>Actual Budget</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($workprograms as $index => $workprogram)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $workprogram->subject }}</td>
                        <td>{{ $workprogram->objective }}</td>
                        <td>{{ $workprogram->location }}</td>
                        <td>{{ $workprogram->planned_date }}</td>
                        <td>{{ $workprogram->actual_date ?? '-' }}</td>
                        <td>{{ $workprogram->funding_source }}</td>
                        <td>$ {{ number_format($workprogram->planned_budget, 0, '.', ',') }}</td>
                        <td>{{ $workprogram->actual_budget ? '$ '.number_format($workprogram->actual_budget, 0, '.', ',') : '-' }}</td>
                        <td>{{ $workprogram->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No Work Programs available yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>