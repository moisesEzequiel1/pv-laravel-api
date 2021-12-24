<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('id_order_details');
            /*
             * fk order from masters (ordernes de compra)
            */
            $table->unsignedBigInteger('order');
            $table->unsignedBigInteger('product');
            $table->decimal('unit_price');
            $table->decimal('discount');
            $table->decimal('num_items');
            $table->decimal('iva');
            $table->decimal('total');
            $table->timestampsTz($precision = 0);
            $table->foreign('order')->references('id_orders')->on('orders');

            $table->foreign('product')->references('id_producto')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
