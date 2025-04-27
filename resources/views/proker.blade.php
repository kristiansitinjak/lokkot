@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Program Kerja Management</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('proker.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Program
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program Name</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prokers as $proker)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $proker->name }}</td>
                                        <td>{{ Str::limit($proker->description, 100) }}</td>
                                        <td>{{ $proker->start_date->format('d M Y') }}</td>
                                        <td>{{ $proker->end_date->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge {{ $proker->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($proker->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('proker.edit', $proker->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('proker.destroy', $proker->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this program?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No programs found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $prokers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
