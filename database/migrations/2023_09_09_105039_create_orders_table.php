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
            $table->integer('parent_id')->unsigned()->default(1);

            $table->string('slug')->unique();
            $table->integer('basket_id')->unsigned();
            $table->dateTime('order_date');
            $table->integer('status_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('basket_id')->references('id')->on('shopping_baskets');
            $table->foreign('status_id')->references('id')->on('order_statuses');
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
