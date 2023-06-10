@extends('layouts.app')

@section('content')
    <h1>Booking Form</h1>

    <form action="{{ route('spots.book', $spot) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="booking_date">Date of Booking</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="num_tickets">Number of Tickets</label>
            <input type="number" name="num_tickets" id="num_tickets" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Book</button>
    </form>
@endsection
