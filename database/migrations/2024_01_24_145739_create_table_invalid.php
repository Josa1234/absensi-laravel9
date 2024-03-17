<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invalid', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->default(now()->toDateString());
            $table->time('waktu')->default(now()->toTimeString());
            $table->string('uid', 20);
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invalid');
    }
};