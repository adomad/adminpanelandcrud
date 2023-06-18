@extends('admin.layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>simple crud in laravel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">simple crud in laravel</div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Ticket List</div>
            <div>
                <a href="{{ route('spots.create') }}" class="btn btn-primary">Create</a>
                {{-- <a href="{{ route('logout') }}" class="btn btn-danger my-3">Logout</a> --}}
            </div>
        </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($spots->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spots as $spot)
                    <tr>
                        <td>{{ $spot->name }}</td>
                        <td>{{ $spot->description }}</td>
                        <td>{{ $spot->capacity }}</td>
                        <td>
                            <a href="{{ route('spots.edit', $spot->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('spots.booking-form', $spot->id) }}" class="btn btn-primary btn-sm">book</a>
                            <form action="{{ route('spots.destroy', $spot->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this spot?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>No spots found.</p>
    
    @endif
    @endsection
@section('customJs')
<script>
    console.log('hello')
</script>
    
@endsection
