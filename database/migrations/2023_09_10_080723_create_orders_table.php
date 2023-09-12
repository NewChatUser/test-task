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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();
            $table->integer('pizza_list_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('quantity');
            $table->double('total_price');
            $table->date('order_date');
            $table->integer('status_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pizza_list_id')->references('id')->on('pizza_lists');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
