<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id('siswa_id');
            $table->string('siswa_nis');
            $table->string('siswa_nama');
            $table->date('siswa_tgl_lahir');
            $table->enum('siswa_jk', ['Laki-Laki', 'Perempuan']);
            $table->string('siswa_notelp');
            $table->text('siswa_alamat');
            $table->string('siswa_password');
            $table->enum('siswa_status', ['Aktif', 'Non Aktif']);
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
        Schema::dropIfExists('tb_siswa');
    }
}
