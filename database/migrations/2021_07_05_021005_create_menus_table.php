<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_menu')->nullable(false);
            $table->string('nama')->nullable(false);
            $table->integer('harga')->nullable(false);
            $table->string('deskripsi')->nullable(false);
            $table->string('gambar')->nullable(false);
            $table->boolean('isRecommended')->nullable(false);
            $table->boolean('isAvailable')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
