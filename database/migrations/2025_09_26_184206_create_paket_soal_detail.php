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
        Schema::create('paket_soal_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('paket_soal')->onDelete('cascade');
            $table->foreignId('soal_id')->constrained('bank_soal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_soal_detail');
    }
};
