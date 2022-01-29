<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('admin_nama');
            $table->string('admin_username');
            $table->string('admin_password');
            $table->enum('admin_jk', ['Laki-Laki', 'Perempuan']);
            $table->string('admin_notelp')->nullable();
            $table->text('admin_alamat')->nullable();
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
        Schema::dropIfExists('tb_admin');
    }
}
