<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->string('siswa_uid', 20);
            $table->timestamps();

            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade');
            $table->foreign('siswa_uid')->references('uid')->on('siswa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_siswa');
    }
};
