<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('description', 50);
            $table->text('summary');
            $table->longText('image');
            $table->decimal('bedrooms', 11, 0);
            $table->decimal('bathrooms', 3, 1);
            $table->decimal('floor_area', 6, 2);
            $table->string('country', 50);
            $table->string('address', 255);
            $table->unsignedBigInteger('property_type_id');
            $table->timestamps();

            $table->foreign('property_type_id')
                ->references('id')
                ->on('property_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
