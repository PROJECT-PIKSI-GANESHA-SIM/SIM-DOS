<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepegawaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepegawaian', function (Blueprint $table) {
            $table->id();
            $table->string('program_studi');
            $table->string('status_kepegawaian');
            $table->string('status_keaktifan');
            $table->string('jabatan_fungsional');
            $table->string('no_sk_sertifikasi_dosen');
            $table->string('no_sk_tmmd');
            $table->date('tanggal_menjadi_dosen');
            $table->string('pangkat_golongan');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('kepegawaian');
    }
}
