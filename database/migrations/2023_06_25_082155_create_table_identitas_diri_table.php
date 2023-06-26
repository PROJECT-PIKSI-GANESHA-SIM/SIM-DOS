<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIdentitasDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_diri', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50);
            $table->string('nik', 50);
            $table->string('nama');
            $table->string('jenis_kelamin', 50);
            $table->string('golongan_darah', 50);
            $table->string('kewarganegaraan', 50);
            $table->string('agama', 50);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status_perkawinan', 50);
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
        Schema::dropIfExists('table_identitas_diri');
    }
}
