<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_info', function (Blueprint $table) {
            $table->id('info_id');
            $table->string('info_judul');
            $table->string('info_slug');
            $table->enum('info_tipe', ['Pengumuman', 'Berita', 'Info PPDB', 'Kegiatan Ekstrakulikuler']);
            $table->string('info_tipe_slug');
            $table->string('info_foto');
            $table->text('info_desk');
            $table->date('info_tgl');
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
        Schema::dropIfExists('tb_info');
    }
}
