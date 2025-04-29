@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Work Program List</h1>
    <a href="{{ route('workprogram.create') }}" class="btn btn-primary mb-3">Add Work Program</a>
    <a href="{{ route('workprogram.history') }}" class="btn btn-info mb-3">Work Program History</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
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
                <th>Period</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workprograms as $workprogram)
            <tr>
                <td>{{ $workprogram->subject }}</td>
                <td>{{ $workprogram->description }}</td>
                <td>{{ $workprogram->objective }}</td>
                <td>{{ $workprogram->location }}</td>
                <td>{{ $workprogram->planned_date }}</td>
                <td>{{ $workprogram->actual_date ?? '-' }}</td>
                <td>{{ $workprogram->funding_source }}</td>
                <td>Rp {{ number_format($workprogram->planned_budget) }}</td>
                <td>
                    @if($workprogram->actual_budget)
                        Rp {{ number_format($workprogram->actual_budget) }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $workprogram->status }}</td>
                <td>{{ $workprogram->period }}</td>
                <td>
                    <a href="{{ route('workprogram.edit', $workprogram->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('workprogram.destroy', $workprogram->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection