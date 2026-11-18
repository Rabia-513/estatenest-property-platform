@extends('layouts.app')
@section('title','Find your next home')
@section('content')
<section class="hero"><div class="hero-pill">CURATED HOMES · MADE SIMPLE</div><h1>Find a place that <em>feels like home.</em></h1><p>Explore beautifully considered homes, compare spaces, and find your next chapter.</p></section>
<form class="filters" method="GET" action="{{ route('home') }}">
<label>Search<input name="q" value="{{ request('q') }}" placeholder="Keyword or feature"></label>
<label>City<input name="city" value="{{ request('city') }}" placeholder="City"></label>
<label>Home type<select name="type"><option value="">All types</option>@foreach(['House','Apartment','Condo','Townhouse'] as $type)<option value="{{ $type }}" @selected(request('type')===$type)>{{ $type }}</option>@endforeach</select></label>
<label>Max price<input type="number" name="max_price" min="0" value="{{ request('max_price') }}" placeholder="Any price"></label><button class="btn" type="submit">Search homes</button>
</form>
<div class="section-title"><h2>Available listings</h2><span>{{ $properties->total() }} homes found</span></div>
<div class="grid">@forelse($properties as $property)
<a href="{{ route('properties.show',$property) }}" class="listing"><div class="listing-photo theme-{{ $loop->index % 5 }}"><span class="photo-icon">⌂</span><span class="tag">{{ $property->property_type }}</span></div><div class="listing-body"><div class="location">📍 {{ $property->city }}</div><h3>{{ $property->title }}</h3><div class="price">${{ number_format($property->price,0) }}</div><div class="features"><span>🛏 {{ $property->bedrooms }} beds</span><span>🛁 {{ $property->bathrooms }} baths</span><span>⌗ {{ number_format($property->area_sqft) }} sqft</span></div></div></a>
@empty<div class="empty">No homes match your filters. Try adjusting your search.</div>@endforelse</div>
<div class="paginate">{{ $properties->links() }}</div>
@endsection
