<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profile', function (Blueprint $table) {
            $table->id('profile_id');
            $table->string('profile_nama');
            $table->string('profile_slug');
            $table->enum('profile_tipe', ['teks', 'file']);
            $table->text('profile_desk');
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
        Schema::dropIfExists('tb_profile');
    }
}
