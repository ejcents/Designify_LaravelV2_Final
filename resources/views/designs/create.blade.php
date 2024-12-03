@extends('layouts.app')

@section('content')
<h1>Create Design</h1>
<form action="{{ route('designs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Concept</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
</form>
@endsection
