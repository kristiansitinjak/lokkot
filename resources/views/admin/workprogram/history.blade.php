@extends('admin.layouts')

@section('content')
<div class="container mt-4">
    <h2>Work Program History</h2>
    <form method="GET" action="" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="period" class="form-control" onchange="this.form.submit()">
                    <option value="">-- Select Period --</option>
                    @foreach($periods as $period)
                        <option value="{{ $period }}" {{ request('period') == $period ? 'selected' : '' }}>{{ $period }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Description</th>
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
                @forelse($workprograms as $workprogram)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $workprogram->subject }}</td>
                    <td>{{ $workprogram->description }}</td>
                    <td>{{ $workprogram->objective }}</td>
                    <td>{{ $workprogram->location }}</td>
                    <td>{{ $workprogram->planned_date }}</td>
                    <td>{{ $workprogram->actual_date ?? '-' }}</td>
                    <td>{{ $workprogram->funding_source }}</td>
                    <td>{{ number_format($workprogram->planned_budget, 0, ',', '.') }}</td>
                    <td>{{ $workprogram->actual_budget ? number_format($workprogram->actual_budget, 0, ',', '.') : '-' }}</td>
                    <td>{{ $workprogram->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">No work programs recorded.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
