@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Spot</h1>

        <form action="{{ route('spots.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('spots.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
