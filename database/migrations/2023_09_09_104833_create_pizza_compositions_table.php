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
        Schema::create('pizza_compositions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);

            $table->integer('pizza_id')->unsigned();

            $table->string('slug')->unique();
            $table->integer('ingredients_id')->unsigned();
            $table->float('price');

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
        Schema::dropIfExists('pizza_compositions');
    }
};
