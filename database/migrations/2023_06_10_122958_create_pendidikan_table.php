<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenjang_pendidikan')->references('id')->on('jenjang_pendidikan');
            $table->string('bidang_studi')->nullable();
            $table->string('nama_instansi');
            $table->string('lokasi_institusi');
            $table->string('dalam_luar_negeri');
            $table->string('nomor_ijazah');
            $table->string('predikat_kelulusan');
            $table->string('gelar_singkat')->nullable();
            $table->string('gelar_panjang')->nullable();
            $table->date('tanggal_mulai_studi');
            $table->date('tanggal_berakhir_studi');
            $table->string('judul_penelitian')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->string('transkrip_nilai')->nullable();
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
        Schema::dropIfExists('pendidikan');
    }
}
