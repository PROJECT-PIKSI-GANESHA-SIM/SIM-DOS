<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformationCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informationcenter', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('thumbnail');
            $table->string('category');
            $table->date('date');
            $table->string('description', 2000);
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
        Schema::dropIfExists('informationcenter');
    }
}
