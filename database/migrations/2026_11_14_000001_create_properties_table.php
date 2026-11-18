<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('city', 80)->index();
            $table->string('address', 200);
            $table->string('property_type', 30)->index();
            $table->decimal('price', 12, 2)->index();
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedInteger('area_sqft');
            $table->text('description');
            $table->string('status', 30)->default('Available')->index();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('properties'); }
};
