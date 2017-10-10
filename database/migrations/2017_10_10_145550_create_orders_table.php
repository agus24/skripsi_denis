<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('no_invoice')->unique();
            $table->date('tanggal_order');
            $table->date('tanggal_approve')->nullable();
            $table->date('tanggal_kirim')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->integer('grand_total');
            $table->integer('batal')->default(0);
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('produk_id')->unsigned();
            $table->integer('harga');
            $table->integer('qty');
        });

        Schema::create('order_cancels', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->date('tanggal_batal');
            $table->text('alasan');
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
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('order_cancels');
    }
}
