@extends('layouts.app')
@section('title',$property->exists?'Edit listing':'Add listing')
@section('content')
<div class="crumb"><a href="{{ route('admin.properties.index') }}">← Back to dashboard</a></div>
<div class="form-wrap"><h1>{{ $property->exists ? 'Edit property' : 'Add a new property' }}</h1><p class="muted">Fill the details below to publish a demo listing.</p>
@if($errors->any())<div class="alert error"><strong>Check the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ $property->exists ? route('admin.properties.update',$property) : route('admin.properties.store') }}">@csrf @if($property->exists) @method('PUT') @endif
<div class="form-grid"><label class="wide">Title<input name="title" required maxlength="150" value="{{ old('title',$property->title) }}"></label><label>City<input name="city" required maxlength="80" value="{{ old('city',$property->city) }}"></label><label>Address<input name="address" required maxlength="200" value="{{ old('address',$property->address) }}"></label>
<label>Type<select name="property_type">@foreach(['House','Apartment','Condo','Townhouse'] as $type)<option value="{{ $type }}" @selected(old('property_type',$property->property_type)===$type)>{{ $type }}</option>@endforeach</select></label>
<label>Price ($)<input type="number" name="price" step="0.01" min="1" required value="{{ old('price',$property->price) }}"></label>
<label>Bedrooms<input type="number" name="bedrooms" min="0" max="30" required value="{{ old('bedrooms',$property->bedrooms ?? 2) }}"></label><label>Bathrooms<input type="number" name="bathrooms" min="0" max="30" required value="{{ old('bathrooms',$property->bathrooms ?? 2) }}"></label>
<label>Area (sqft)<input type="number" name="area_sqft" min="1" required value="{{ old('area_sqft',$property->area_sqft ?? 1000) }}"></label><label>Status<select name="status">@foreach(['Available','Draft','Sold'] as $status)<option value="{{ $status }}" @selected(old('status',$property->status ?? 'Available')===$status)>{{ $status }}</option>@endforeach</select></label>
<label class="wide">Description<textarea name="description" rows="6" required>{{ old('description',$property->description) }}</textarea></label></div><button class="btn" type="submit">{{ $property->exists ? 'Save changes' : 'Create listing' }}</button></form></div>
@endsection
