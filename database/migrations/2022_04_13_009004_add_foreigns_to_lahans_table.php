<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToLahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lahans', function (Blueprint $table) {
            $table
                ->foreign('jenis_tanamans_id')
                ->references('id')
                ->on('jenis_tanamans')
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
        Schema::table('lahans', function (Blueprint $table) {
            $table->dropForeign(['jenis_tanamans_id']);
        });
    }
}
