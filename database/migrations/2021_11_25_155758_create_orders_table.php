<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_orders')->unique();
            /*
             * fk user
             * fk costumer
            */
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('costumer');
            $table->decimal('sub_total');
            $table->decimal('discount');
            $table->decimal('iva');
            $table->decimal('total');
            $table->timestampsTz($precision = 0);
            $table->foreign('user')->references('id_user')->on('users');
            $table->foreign('costumer')->references('id_costumers')->on('costumers');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
