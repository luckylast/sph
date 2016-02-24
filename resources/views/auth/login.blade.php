<!-- resources/views/auth/login.blade.php -->
@extends('templates.default')
@section('title')Login @stop 

@section('content')
<form method="POST" action="/login">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Password</label>
        <input type="password" name="password" id="password" class="form-control    ">
    </div>

    <div class="checkbox">
        <label><input type="checkbox" name="remember"> Remember Me</label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Login</button>
    </div>
</form>
@stop