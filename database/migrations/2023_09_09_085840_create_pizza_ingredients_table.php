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
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pizza_id')->unsigned();

            $table->string('slug')->unique();
            $table->integer('ingredients_id');
            $table->integer('size_id');
            $table->float('price');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pizza_id')->references('id')->on('pizza_lists');
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
            $table->foreign('size_id')->references('id')->on('pizza_sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredients');
    }
};
