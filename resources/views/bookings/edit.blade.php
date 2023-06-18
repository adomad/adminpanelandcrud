<!-- resources/views/bookings/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Edit Booking</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $booking->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $booking->email }}" required>
        </div>

        <div class="form-group">
            <label for="booking_date">Date of Booking</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" value="{{ $booking->booking_date }}" required>
        </div>

        <div class="form-group">
            <label for="num_tickets">Number of Tickets</label>
            <input type="number" name="num_tickets" id="num_tickets" class="form-control" value="{{ $booking->num_tickets }}" required>
        </div>

        <div class="form-group">
            <label for="spot_id">Spot ID</label>
            <input type="number" name="spot_id" id="spot_id" class="form-control" value="{{ $booking->spot_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
