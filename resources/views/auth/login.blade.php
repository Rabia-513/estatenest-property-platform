@extends('layouts.app')
@section('title','Staff login')
@section('content')
<div class="auth"><div class="hero-pill">STAFF ACCESS</div><h1>Welcome back</h1><p class="muted">Sign in to manage EstateNest listings.</p>
@if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.submit') }}">@csrf<label>Email<input type="email" name="email" value="{{ old('email') }}" required autocomplete="username"></label><label>Password<input type="password" name="password" required autocomplete="current-password"></label><button class="btn full" type="submit">Sign in</button></form><p class="muted">Staff accounts are created privately through the database seeder.</p></div>
@endsection
