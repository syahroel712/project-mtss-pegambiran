<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->id('nilai_id');
            $table->integer('guru_id');
            $table->integer('kepsek_id')->default(0);
            $table->integer('siswa_id');
            $table->integer('kelas_id');
            $table->integer('semester_id');
            $table->integer('tahun_ajar_id');
            $table->date('nilai_acc')->nullable();
            $table->string('nilai_tahun')->nullable();
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
        Schema::dropIfExists('tb_nilai');
    }
}
