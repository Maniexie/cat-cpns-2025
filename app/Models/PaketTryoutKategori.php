<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketTryoutKategori extends Model
{
    protected $table = "paket_tryout_kategori";
    protected $fillable = ["paket_tryout_id", "kategori_soal_id", "jumlah_soal"];

    public function paketTryout()
    {
        return $this->hasMany(PaketTryout::class, "paket_tryout_id");
    }
}
