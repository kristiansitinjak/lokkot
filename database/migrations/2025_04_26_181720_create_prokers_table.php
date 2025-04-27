<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkersTable extends Migration
{
    public function up()
    {
        Schema::create('prokers', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->date('rencana_tanggal');
            $table->date('realisasi_tanggal')->nullable();
            $table->bigInteger('rencana_biaya');
            $table->bigInteger('realisasi_biaya')->nullable();
            $table->string('status')->default('Belum Dilaksanakan');
            $table->string('masa_jabatan'); // username admin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prokers');
    }
}
