<!-- resources/views/bookings/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Bookings</h1>

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Create Booking</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Number of Tickets</th>
                <th>Spot ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->num_tickets }}</td>
                    <td>{{ $booking->spot_id }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
