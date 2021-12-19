<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BiayaPerbaikanUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl')->nullable();
            $table->integer('id_nopol')->nullable();
            $table->integer('id_driver')->nullable();
            $table->longText('ket')->nullable();
            $table->bigInteger('jml')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpu');
    }
}
