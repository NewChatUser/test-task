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
        Schema::create('baskets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pizza_list_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('quantity');
            $table->double('total_price');
            $table->integer('customer_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pizza_list_id')->references('id')->on('pizza_lists');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
    }
};
