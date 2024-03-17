<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nama', 50);
            $table->string('uid', 20)->primary();
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->bigInteger('phone')->unsigned();
            $table->text('alamat');
            $table->string('picture', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};


