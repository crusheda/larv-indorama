<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_vehicle')->nullable();
            $table->date('tgl')->nullable();
            $table->integer('pks')->nullable();
            $table->integer('tujuan')->nullable();
            $table->bigInteger('ongkos')->nullable();
            $table->longText('lainnya')->nullable();
            $table->bigInteger('t_muat')->nullable();
            $table->bigInteger('t_bongkar')->nullable();
            $table->string('susut')->nullable();
            $table->integer('bbm_perliter')->nullable();
            $table->integer('bbm_liter')->nullable();
            $table->bigInteger('bbm_rp')->nullable();
            $table->bigInteger('uang_makan')->nullable();
            $table->longText('bpu_ket')->nullable();
            $table->bigInteger('bpu_rp')->nullable();
            $table->bigInteger('kotor')->nullable();
            $table->bigInteger('bersih')->nullable();
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
        Schema::dropIfExists('pu');
    }
}
