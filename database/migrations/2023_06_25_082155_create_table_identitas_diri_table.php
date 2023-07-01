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
            $table->string('nip', 50)->nullable();
            $table->string('nik', 50)->default("-");
            $table->string('foto')->default("-");
            $table->string('nama')->default("-");
            $table->string('jenis_kelamin', 50)->default("-");
            $table->string('golongan_darah', 50)->default("-");
            $table->string('kewarganegaraan', 50)->default("Indonesia");
            $table->string('agama', 50)->default("-");
            $table->string('tempat_lahir')->nullable()->default("-");
            $table->date('tanggal_lahir')->nullable()->default(now());
            $table->string('status_perkawinan', 50)->default("Belum Kawin");
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
