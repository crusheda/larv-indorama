<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('kode_unit')->nullable();
            $table->integer('id_nopol')->nullable();
            $table->integer('id_driver')->nullable();
            $table->integer('id_ban')->nullable();
            $table->longText('ket')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->bigInteger('bayar')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('pb');
    }
}
