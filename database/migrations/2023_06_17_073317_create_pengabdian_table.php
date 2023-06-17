<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengabdianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengabdian', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pengabdian');
            $table->string('bidang_keilmuan');
            $table->string('latar_belakang');
            $table->string('manfaat');
            $table->string('sasaran');
            $table->date('tahun_pelaksanaan');
            $table->string('lama_kegiatan');
            $table->string('lokasi_pelaksanaan');
            $table->string('biaya_kegiatan')->nullable();
            $table->string('target');
            $table->string('kendala')->nullable();
            $table->string('hasil')->nullable();
            $table->string('evaluasi')->nullable();
            $table->string('link_publikasi')->nullable();
            $table->string('surat_tugas')->nullable();
            $table->string('laporan_kegiatan')->nullable();
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
        Schema::dropIfExists('pkm');
    }
}
