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
        Schema::create('pizzas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(1);

            $table->integer('category_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('pizza_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizzas');
    }
};
