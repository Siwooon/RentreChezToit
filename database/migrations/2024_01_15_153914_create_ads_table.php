<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    public function up()
    {

        Schema::dropIfExists('ads');

        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->timestamps(); // created_at et updated_at

            $table->unsignedBigInteger('user_id'); // Ajoutez la colonne pour la clé étrangère
            $table->unsignedBigInteger('accomodation_id'); // Ajoutez la colonne pour la clé étrangère
        
            // Définissez la clé étrangère
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('accomodations_id')->references('id')->on('accomodations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
