<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajaran', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->foreignId('program_studi')->references('id')->on('program_studis');
            $table->string('nama_mata_kuliah');
            $table->string('jenis_mata_kuliah');
            $table->string('kelas');
            $table->string('jumlah_sks');
            $table->string('jumlah_mahasiswa');
            $table->string('bukti_pengajaran');
            $table->string('bukti_presensi');
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
        Schema::dropIfExists('pengajaran');
    }
}
