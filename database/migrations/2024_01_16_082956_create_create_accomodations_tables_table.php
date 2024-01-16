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
        Schema::create('create_accomodations_tables', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('living_space', 10, 2);
            $table->decimal('land_area', 10, 2)->nullable();
            $table->text('description');
            $table->boolean('garage');
            $table->boolean('balcony');
            $table->boolean('terrace');
            $table->boolean('elevator');
            $table->string('energetic_class')->nullable();
            $table->boolean('cave');
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_accomodations_tables');
    }
};
