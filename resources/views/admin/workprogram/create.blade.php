@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Add Work Program</h1>

    <form action="{{ route('workprogram.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Objective</label>
            <textarea name="objective" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Planned Date</label>
            <input type="date" name="planned_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Actual Date</label>
            <input type="date" name="actual_date" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Funding Source</label>
            <input type="text" name="funding_source" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Planned Budget</label>
            <input type="number" name="planned_budget" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Actual Budget</label>
            <input type="number" name="actual_budget" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Planned">Planned</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
