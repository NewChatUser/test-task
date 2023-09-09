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
        Schema::create('shopping_baskets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);

            $table->string('slug')->unique();
            $table->integer('pizza_id');
            $table->integer('size_id');
            $table->integer('quantity');
            $table->float('total_cost');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pizza_id')->references('id')->on('pizza_compositions');
            $table->foreign('size_id')->references('id')->on('pizza_sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_baskets');
    }
};
