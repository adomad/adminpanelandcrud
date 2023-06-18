<!-- resources/views/bookings/show.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Booking Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $booking->name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ $booking->email }}<br>
                <strong>Date of Booking:</strong> {{ $booking->booking_date }}<br>
                <strong>Number of Tickets:</strong> {{ $booking->num_tickets }}<br>
                <strong>Spot ID:</strong> {{ $booking->spot_id }}
            </p>
            <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
