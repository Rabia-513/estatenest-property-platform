<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    public function index() { return view('admin.index', ['properties' => Property::latest()->paginate(15)]); }
    public function create() { return view('admin.form', ['property' => new Property()]); }
    public function store(Request $request) { Property::create($this->validated($request)); return redirect()->route('admin.properties.index')->with('message', 'Property created.'); }
    public function edit(Property $property) { return view('admin.form', compact('property')); }
    public function update(Request $request, Property $property) { $property->update($this->validated($request)); return redirect()->route('admin.properties.index')->with('message', 'Property updated.'); }
    public function destroy(Property $property) { $property->delete(); return redirect()->route('admin.properties.index')->with('message', 'Property deleted.'); }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'city' => ['required', 'string', 'max:80'],
            'address' => ['required', 'string', 'max:200'],
            'property_type' => ['required', Rule::in(['House','Apartment','Condo','Townhouse'])],
            'price' => ['required', 'numeric', 'min:1', 'max:999999999'],
            'bedrooms' => ['required', 'integer', 'min:0', 'max:30'],
            'bathrooms' => ['required', 'integer', 'min:0', 'max:30'],
            'area_sqft' => ['required', 'integer', 'min:1', 'max:1000000'],
            'description' => ['required', 'string', 'max:3000'],
            'status' => ['required', Rule::in(['Available','Sold','Draft'])],
        ]);
    }
}
