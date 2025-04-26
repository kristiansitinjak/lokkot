<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nama')->nullable();
            $table->string('nim')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('role')->nullable();
            $table->string('masa_jabatan')->nullable()->unique(); // ← masa_jabatan diatur nullable & unique
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
        Schema::dropIfExists('local_users');
    }
};
