<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        if ($email && $password && $password !== 'CHANGE_ME_BEFORE_SEEDING') {
            User::updateOrCreate(['email' => $email], ['name' => 'EstateNest Admin', 'password' => Hash::make($password)]);
        }

        $sample = [
            ['Modern Garden Townhome', 'Alexandria', '101 Sample Lane', 'Townhouse', 525000, 3, 3, 1780, 'Bright, modern living with a private patio and a flexible office space.'],
            ['Sunny Downtown Apartment', 'Arlington', '22 Example Avenue', 'Apartment', 345000, 2, 2, 1090, 'Walkable neighborhood with an open-concept kitchen and big windows.'],
            ['Classic Family Residence', 'Fairfax', '8 Demo Court', 'House', 795000, 4, 3, 2600, 'Spacious family home with a landscaped garden and garage.'],
            ['Riverside Condo Retreat', 'Washington', '50 Fictional Street', 'Condo', 435000, 2, 2, 1230, 'Contemporary condo with comfortable shared spaces and scenic views.'],
            ['Cozy Starter House', 'Springfield', '7 Placeholder Road', 'House', 415000, 3, 2, 1450, 'Comfortable starter home with updated finishes and easy access to parks.'],
        ];
        foreach ($sample as [$title, $city, $address, $type, $price, $beds, $baths, $area, $description]) {
            Property::firstOrCreate(['title' => $title], [
                'city' => $city, 'address' => $address, 'property_type' => $type,
                'price' => $price, 'bedrooms' => $beds, 'bathrooms' => $baths,
                'area_sqft' => $area, 'description' => $description, 'status' => 'Available'
            ]);
        }
    }
}
