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
        Schema::create('jawaban_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // user_id
            $table->foreignId('paket_tryout_id')->constrained('paket_tryout')->onDelete('cascade');
            $table->foreignId('bank_soal_id')->constrained('bank_soal')->onDelete('cascade');
            $table->string('jawaban')->nullable(); // A/B/C/D/E
            $table->integer('skor')->nullable();   // nilai per soal (diisi setelah koreksi)
            $table->timestamps();

            $table->unique(['user_id', 'paket_tryout_id', 'bank_soal_id']); // biar 1 soal = 1 jawaban per peserta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_users');
    }
};
