<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['title', 'city', 'address', 'property_type', 'price', 'bedrooms', 'bathrooms', 'area_sqft', 'description', 'status'];

    protected $casts = ['price' => 'decimal:2', 'bedrooms' => 'integer', 'bathrooms' => 'integer', 'area_sqft' => 'integer'];
}
