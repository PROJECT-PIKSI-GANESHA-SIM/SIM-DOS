<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaianLuaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_luaran', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_luaran');
            $table->string('judul_karya');
            $table->string('tanggal');
            $table->string('tautan_eksternal');
            $table->string('upload_document')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('capaian_luaran');
    }
}
