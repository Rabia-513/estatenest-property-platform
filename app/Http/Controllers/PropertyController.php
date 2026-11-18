<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:80'],
            'type' => ['nullable', 'string', 'in:House,Apartment,Condo,Townhouse'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
        ]);
        $query = Property::query()->where('status', 'Available');
        if (!empty($filters['q'])) {
            $term = $filters['q'];
            $query->where(fn ($q) => $q->where('title', 'like', "%{$term}%")->orWhere('description', 'like', "%{$term}%"));
        }
        if (!empty($filters['city'])) $query->where('city', 'like', '%'.$filters['city'].'%');
        if (!empty($filters['type'])) $query->where('property_type', $filters['type']);
        if (isset($filters['max_price']) && $filters['max_price'] !== '') $query->where('price', '<=', $filters['max_price']);
        return view('properties.index', ['properties' => $query->latest()->paginate(9)->withQueryString()]);
    }

    public function show(Property $property)
    {
        abort_unless($property->status === 'Available', 404);
        return view('properties.show', compact('property'));
    }
}
