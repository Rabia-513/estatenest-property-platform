@extends('layouts.app')
@section('title',$property->title)
@section('content')
<div class="crumb"><a href="{{ route('home') }}">← All listings</a> / {{ $property->city }}</div>
<section class="detail-hero"><div class="detail-art">⌂</div><div class="detail-copy"><div class="hero-pill">{{ $property->property_type }} · {{ $property->status }}</div><h1>{{ $property->title }}</h1><p>📍 {{ $property->address }}, {{ $property->city }}</p><div class="big-price">${{ number_format($property->price,0) }}</div><div class="features large"><span>🛏 {{ $property->bedrooms }} bedrooms</span><span>🛁 {{ $property->bathrooms }} bathrooms</span><span>⌗ {{ number_format($property->area_sqft) }} sqft</span></div></div></section>
<div class="detail-desc"><h2>About this home</h2><p>{{ $property->description }}</p><p class="muted">Demo listing only. No real properties are being offered for sale.</p></div>
@endsection
