<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karirs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index()->unique();
            $table->string('judul');
            $table->longText('deskripsi');
            $table->date('tanggal_akhir');
            $table->enum('jenis', ['MAGANG', 'LOWONGAN']);
            $table->enum('status', ['OPEN', 'CLOSED']);
            $table->unsignedBigInteger('penulis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karirs');
    }
};
