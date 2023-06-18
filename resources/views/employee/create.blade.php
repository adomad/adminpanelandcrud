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
<div class ="container">
    <div class="d-flex justify-content-between py-3">
    <div class="h4">E-Ticketing System</div>
    <div>
        <a href="{{route('employees.index')}}" class= "btn btn-primary">Back</a>
</div>
</div>
<form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class= "card boarder-0 shadow-lg">
    <div class="card-body">
        <div class="mb-3">
            <label for="name"class=form-label>Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control @error('name')
            is-invalid @enderror" value="{{old('name')}}">
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
</div>
<div class="mb-3">
            <label for="name"class=form-label>Email</label>
            <input type="text" name="email" id="email" placeholder="Enter email" class="form-control @error('email')
            is-invalid @enderror" value="{{old('email')}}">
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
</div>
<div class="mb-3">
            <label for="name"class=form-label>Address</label>
            <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter address" class="form-control">{{old('address')}}</textarea>
</div>  
<div class="mb-3">
            <label for="image"class=form-label></label>
            <input type="file" name="image" class="@error('image')
            is-invalid @enderror">
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
</div> 

</div>

</div>
<button class="btn btn-primary mt-3">Save Ticket</button>
</div>

    </body>
</html>
@endsection