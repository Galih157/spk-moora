<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuntunganAsuransiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuntungan_asuransi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_asuransi');
            $table->integer('usia_min');
            $table->integer('usia_max')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->integer('premi');
            $table->integer('jumlah_pencairan');
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
        Schema::dropIfExists('keuntungan_asuransi');
    }
}
