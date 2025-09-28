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
        Schema::create('hasil_tryout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');    // siapa yang ikut tryout
            $table->unsignedBigInteger('bank_soal_id');    // bank soal relasi
            $table->string('jawaban_user', 1);     // A/B/C/D/E
            $table->string('jawaban_benar', 1);       // A/B/C/D/E (relasi dari bank_soal)
            $table->boolean('is_correct')->default(false); // 1 jika benar, 0 kalau salah
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bank_soal_id')->references('id')->on('bank_soal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_tryout');
    }
};
