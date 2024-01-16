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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->decimal('size', 10, 2);
            $table->integer('windows');
            $table->timestamps();

            $table->unsignedBigInteger('type_of_rooms_id');
            $table->unsignedBigInteger('accomodations_id');

            $table->foreign('type_of_rooms_id')->references('id')->on('type_of_rooms')->onDelete('cascade');
            $table->foreign('accomodations_id')->references('id')->on('accomodations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_room_tables');
    }
};
