<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->string('id_mk', 15)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->string('NIP', 20);
            $table->timestamps();
            $table->foreign('NIP')->references('NIP')->on('dosen')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
