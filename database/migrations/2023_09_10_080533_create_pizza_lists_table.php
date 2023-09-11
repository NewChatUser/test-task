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
        Schema::create('pizza_lists', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();
            $table->integer('pizza_id')->unsigned();
            $table->integer('ingredients_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_lists');
    }
};
