<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTransaksiPetanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_transaksi_petanis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stok', 3);
            $table->string('harga', 7);
            $table->unsignedBigInteger('panen_id');
            $table->unsignedBigInteger('transaksi_petani_id');
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('item_transaksi_petanis');
    }
}
