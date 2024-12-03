@extends('layouts.app')

@section('content')
<h1>Edit Design</h1>
<form action="{{ route('designs.update', $design) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Concept</label>
        <input type="text" name="title" id="title" value="{{ $design->title }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $design->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
