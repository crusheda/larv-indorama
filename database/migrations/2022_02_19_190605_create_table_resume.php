<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableResume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_customer')->nullable();
            $table->integer('inv')->nullable();
            $table->bigInteger('tonase')->nullable();
            $table->bigInteger('harga_arm')->nullable();
            $table->bigInteger('total_harga')->nullable();
            $table->bigInteger('fee_mgmt')->nullable();
            $table->bigInteger('entertainer')->nullable();
            $table->bigInteger('susut')->nullable();
            $table->bigInteger('jasa_pelabuhan')->nullable();
            $table->bigInteger('jasa_timbangan')->nullable();
            $table->bigInteger('deduction_bbm')->nullable();
            $table->bigInteger('pengalihan_rute')->nullable();
            $table->bigInteger('harga_spk')->nullable();
            $table->bigInteger('dpp')->nullable();
            $table->bigInteger('ppn')->nullable();
            $table->bigInteger('pph')->nullable();
            $table->bigInteger('total_inv')->nullable();
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            // $table->date('tgl')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->bigInteger('fee')->nullable();
            $table->bigInteger('transfer')->nullable();
            $table->date('tgl_transfer')->nullable();
            $table->longText('ket')->nullable();
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
        Schema::dropIfExists('resume');
    }
}
