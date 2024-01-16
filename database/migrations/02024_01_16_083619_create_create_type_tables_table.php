<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('types');
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Ajout d'une contrainte CHECK pour limiter aux types "maison" ou "appartement"
        DB::statement("ALTER TABLE types ADD CONSTRAINT check_types_name CHECK (name IN ('maison', 'appartement'))");
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
};
