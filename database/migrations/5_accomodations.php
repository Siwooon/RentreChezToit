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
            $table->boolean('garage')->nullable();
            $table->boolean('balcony')->nullable();
            $table->boolean('terrace')->nullable();
            $table->boolean('elevator')->nullable();
            $table->string('energetic_class')->nullable();
            $table->boolean('cave')->nullable();
            $table->timestamps(); // created_at et updated_at

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
