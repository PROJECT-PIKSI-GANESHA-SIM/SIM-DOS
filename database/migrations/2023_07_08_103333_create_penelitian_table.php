<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('status_peneliti', 50);
            $table->string('kelompok_bidang');
            $table->string('judul_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->string('tahun_usulan');
            $table->string('tahun_kegiatan');
            $table->string('jumlah_dana');
            $table->string('sumber_dana');
            $table->string('nomor_sk_penugasan');
            $table->string('tanggal_sk_penugasan');
            $table->string('link_publikasi');
            $table->string('surat_tugas');
            $table->string('publikasi');
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
        Schema::dropIfExists('penelitian');
    }
}