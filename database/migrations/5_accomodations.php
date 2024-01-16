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
            $table->decimal('land_area', 10, 2)->default(null)->nullable();
            $table->text('description');
            $table->boolean('garage')->default(null)->nullable();
            $table->boolean('balcony')->default(null)->nullable();
            $table->boolean('terrace')->default(null)->nullable();
            $table->boolean('elevator')->default(null)->nullable();
            $table->string('energetic_class')->default(null)->nullable();
            $table->boolean('cave')->default(null)->nullable();
            $table->timestamps(); // created_at et updated_at

            $table->unsignedBigInteger('user_id');
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
