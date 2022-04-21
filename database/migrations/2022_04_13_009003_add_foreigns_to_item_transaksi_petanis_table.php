<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToItemTransaksiPetanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_transaksi_petanis', function (Blueprint $table) {
            $table
                ->foreign('panen_id')
                ->references('id')
                ->on('panens')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('transaksi_petani_id')
                ->references('id')
                ->on('transaksi_petanis')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_transaksi_petanis', function (Blueprint $table) {
            $table->dropForeign(['panen_id']);
            $table->dropForeign(['transaksi_petani_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
