<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 10);
            $table->time('jam_mulai')->default(now()->toTimeString());
            $table->time('jam_selesai')->default(now()->toTimeString());
            $table->unsignedBigInteger('materi_id');
            $table->string('instruktur', 50);
            $table->string('ruang', 10);
            $table->date('tanggal_mulai')->default(now()->toDateString());
            $table->date('tanggal_selesai')->default(now()->toDateString());
            $table->string('hari');
            $table->timestamps();
            $table->foreign('materi_id')->references('id')->on('materi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};
