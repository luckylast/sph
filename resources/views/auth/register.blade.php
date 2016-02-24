<!-- resources/views/auth/register.blade.php -->
@extends('templates.default')
@section('title')Register @stop 

@section('content')
<form method="POST" action="/register">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-default">Register</button>
    </div>
</form>
@stop