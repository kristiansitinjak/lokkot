<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkprogramsTable extends Migration
{
    public function up()
    {
        Schema::create('workprograms', function (Blueprint $table) {
            $table->id();
            $table->string('subject');               // perihal
            $table->string('description');           // deskripsi
            $table->string('objective');             // tujuan
            $table->string('location');              // lokasi
            $table->date('planned_date');            // rencana_tanggal
            $table->date('actual_date')->nullable(); // realisasi_tanggal
            $table->string('funding_source');        // sumber_dana
            $table->bigInteger('planned_budget');    // rencana_biaya
            $table->bigInteger('actual_budget')->nullable(); // realisasi_biaya
            $table->string('status')->default('Not Yet Implemented'); // status default
            $table->string('period');                // masa_jabatan (username admin)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workprograms');
    }
}
