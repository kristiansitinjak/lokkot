@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Edit Work Program</h1>

    <form action="{{ route('workprogram.update', $workprogram) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ $workprogram->subject }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $workprogram->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Objective</label>
            <textarea name="objective" class="form-control" rows="3" required>{{ $workprogram->objective }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ $workprogram->location }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Planned Date</label>
            <input type="date" name="planned_date" class="form-control" value="{{ $workprogram->planned_date }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Actual Date</label>
            <input type="date" name="actual_date" class="form-control" value="{{ $workprogram->actual_date }}">
        </div>

        <div class="form-group mb-3">
            <label>Funding Source</label>
            <input type="text" name="funding_source" class="form-control" value="{{ $workprogram->funding_source }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Planned Budget</label>
            <input type="number" name="planned_budget" class="form-control" value="{{ $workprogram->planned_budget }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Actual Budget</label>
            <input type="number" name="actual_budget" class="form-control" value="{{ $workprogram->actual_budget }}">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Planned" {{ $workprogram->status == 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="In Progress" {{ $workprogram->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $workprogram->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
