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
            $table->id();
            $table->string('transaction_id')->unique();
            $table->unsignedBigInteger('meja_id');
            $table->date('tanggal')->nullable(false);
            $table->integer('harga')->nullable(false);
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
           
            $table->foreign('meja_id')->references('id')->on('mejas')->onDelete('cascade');;
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
