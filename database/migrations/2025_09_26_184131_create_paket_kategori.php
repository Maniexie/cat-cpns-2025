<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('paket_soal')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_soal')->onDelete('cascade');
            $table->integer('jumlah_soal'); // misal 10
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_kategori');
    }
};
