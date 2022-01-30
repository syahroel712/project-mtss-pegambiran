<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_spp', function (Blueprint $table) {
            $table->id('spp_id');
            $table->integer('siswa_id');
            $table->integer('kelas_id');
            $table->integer('tahun_ajar_id');
            $table->date('spp_tgl_bayar');
            $table->integer('spp_bayar');
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
        Schema::dropIfExists('tb_spp');
    }
}
