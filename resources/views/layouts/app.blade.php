<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title','EstateNest') | EstateNest</title><link rel="stylesheet" href="{{ asset('css/estate.css') }}"></head>
<body><header class="header"><div class="container nav"><a class="brand" href="{{ route('home') }}">⌂ <span>EstateNest</span></a><nav><a href="{{ route('home') }}">Explore homes</a>@auth<a href="{{ route('admin.properties.index') }}">Dashboard</a><form method="POST" action="{{ route('logout') }}">@csrf<button class="nav-link" type="submit">Sign out</button></form>@else<a href="{{ route('login') }}">Staff login</a>@endauth</nav></div></header>
<main class="container">@if(session('message'))<div class="alert good">{{ session('message') }}</div>@endif @yield('content')</main>
<footer class="footer"><div class="container">EstateNest · Fictional real estate listings for internship demonstration · {{ date('Y') }}</div></footer>
</body></html>
