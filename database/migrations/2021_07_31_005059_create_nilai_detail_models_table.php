<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiDetailModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai_detail', function (Blueprint $table) {
            $table->id('nilai_detail_id');
            $table->integer('nilai_id');
            $table->integer('mapel_id');
            $table->double('nilai_detail_kognitif', 8, 2);
            $table->double('nilai_detail_keterampilan', 8, 2);
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
        Schema::dropIfExists('tb_nilai_detail');
    }
}
