<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('description');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('price',5,2);
            $table->foreignId('genre_id')->constrained();
            $table->foreignId('platform_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videogames');
    }
};
