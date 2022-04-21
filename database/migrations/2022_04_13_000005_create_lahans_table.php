<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table
                ->enum('status_panen', ['Proses Tanam', 'Sudah Panen'])
                ->default('Proses Tanam');
            $table->string('lattitude', 15);
            $table->string('longitude', 15);
            $table->unsignedBigInteger('jenis_tanamans_id');

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
        Schema::dropIfExists('lahans');
    }
}
