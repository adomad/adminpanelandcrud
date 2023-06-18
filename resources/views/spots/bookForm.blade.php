@extends('admin.layouts.app')
@section('content')
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>simple crud in laravel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div class="bg-dark py-3">
                <div class="container">
                    {{-- <div class="h4 text-white">{{ Auth::user()->name }}</div> --}}
</div>

</div>
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
