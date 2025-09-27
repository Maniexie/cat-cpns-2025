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
        Schema::create('bank_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_soal_id')->constrained('kategori_soal')->onDelete('cascade');
            $table->foreignId('paket_tryout_id')->constrained('paket_tryout')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('opsi_a');
            $table->string('opsi_b');
            $table->string('opsi_c');
            $table->string('opsi_d');
            $table->string('opsi_e')->nullable();
            $table->string('jawaban_benar')->nullable(); // khusus TWK & TIU
            // $table->string('jawaban_benar_tkp')->nullable(); // khusus TKP
            $table->string('pembahasan')->nullable();
            $table->json('bobot_opsi')->nullable(); // untuk TKP (misal {"a":5,"b":4,"c":3,"d":2,"e":1})
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_soal');
    }
};
