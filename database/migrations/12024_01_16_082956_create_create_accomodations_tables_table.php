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
        Schema::dropIfExists('accomodations');
        Schema::create('accomodations', function (Blueprint $table) {
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
            $table->unsignedBigInteger('type_id');

            $table->timestamps(); // created_at et updated_at

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodations');
    }
};
