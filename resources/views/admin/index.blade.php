@extends('layouts.app')
@section('title','Manage listings')
@section('content')
<div class="section-title dashboard-title"><div><div class="hero-pill">STAFF DASHBOARD</div><h1>Manage properties</h1></div><a class="btn" href="{{ route('admin.properties.create') }}">+ Add property</a></div>
<div class="panel table-wrap"><table><thead><tr><th>Property</th><th>Location</th><th>Price</th><th>Status</th><th>Actions</th></tr></thead><tbody>@foreach($properties as $property)<tr><td><strong>{{ $property->title }}</strong><div class="muted">{{ $property->property_type }}</div></td><td>{{ $property->city }}</td><td>${{ number_format($property->price,0) }}</td><td><span class="chip">{{ $property->status }}</span></td><td class="actions"><a href="{{ route('admin.properties.edit',$property) }}">Edit</a><form method="POST" action="{{ route('admin.properties.destroy',$property) }}" onsubmit="return confirm('Delete this listing?')">@csrf @method('DELETE')<button type="submit" class="danger-text">Delete</button></form></td></tr>@endforeach</tbody></table></div><div class="paginate">{{ $properties->links() }}</div>
@endsection
