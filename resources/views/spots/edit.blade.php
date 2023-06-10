@extends('layouts.app')

@section('content')
    <h1>Edit Spot</h1>

    <form action="{{ route('spots.update', $spot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $spot->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $spot->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $spot->capacity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('spots.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
