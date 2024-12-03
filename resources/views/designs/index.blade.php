@extends('layouts.app')

@section('content')
<h1 class="mb-4">Designs Project</h1>

<a href="{{ route('designs.create') }}" class="btn btn-primary mb-4">Add new design project</a>

<!-- Card-based Layout Section -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($designs as $design)
    <div class="col">
        <div class="card h-100 shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ $design->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text text-muted">{{ Str::limit($design->description, 100) }}</p>
                <div class="d-flex justify-content-around mt-3">
                    <a href="{{ route('designs.edit', $design) }}" class="btn btn-sm btn-outline-primary">Modify</a>
                    <!-- Trigger Modal -->
                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $design->id }}">Delete</button>
                </div>
            </div>
            <div class="card-footer text-center text-muted small">
                Created at: {{ $design->created_at->format('M d, Y') }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Table-based Layout Section -->
<hr class="my-5">
<h2 class="mb-4">Detailed View</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id No</th>
            <th>Concept</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($designs as $design)
        <tr>
            <td>{{ $design->id }}</td>
            <td>{{ $design->title }}</td>
            <td>{{ $design->description }}</td>
            <td>
                <a href="{{ route('designs.edit', $design) }}" class="btn btn-warning">Modify</a>
                <!-- Trigger Modal -->
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $design->id }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal for Deleting a Design -->
@foreach($designs as $design)
<div class="modal fade" id="deleteModal{{ $design->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $design->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $design->id }}">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the design titled "{{ $design->title }}"? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Form to Delete the Design -->
                <form action="{{ route('designs.destroy', $design) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
