<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    protected $table = "bank_soal";
    protected $fillable = ["kategori_soal_id", "paket_tryout_id", "pertanyaan", "opsi_a", "opsi_b", "opsi_c", "opsi_d", "opsi_e", "jawaban_benar", "pembahasan", "bobot_opsi"];

    public function kategoriSoal()
    {
        return $this->belongsTo(KategoriSoal::class, "kategori_soal_id ");
    }

    public function paketTryout()
    {
        return $this->belongsTo(PaketTryout::class, "paket_tryout_id");
    }
}
