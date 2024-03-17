<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('nama');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('uid')->on('siswa');
        });
    }

    public function down()
    {
        Schema::dropIfExists('absen');
    }
};
