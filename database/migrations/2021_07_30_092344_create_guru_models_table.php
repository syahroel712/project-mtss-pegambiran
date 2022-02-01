<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_guru', function (Blueprint $table) {
            $table->id('guru_id');
            $table->string('guru_nip')->nullable();
            $table->string('guru_nama');
            $table->date('guru_tgl_lahir')->nullable();
            $table->enum('guru_jk', ['Laki-Laki', 'Perempuan']);
            $table->string('guru_notelp')->nullable();
            $table->text('guru_alamat')->nullable();
            $table->string('guru_username');
            $table->string('guru_password');
            $table->enum('guru_jabatan', ['Kepala Sekolah', 'Guru']);
            $table->enum('guru_status', ['Aktif', 'Pensiun', 'Pindah']);
            $table->string('guru_foto')->nullable();
            $table->integer('mapel_id')->default(0);
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
        Schema::dropIfExists('tb_guru');
    }
}
