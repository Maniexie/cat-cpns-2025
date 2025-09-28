<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapTryout extends Model
{
    protected $table = "rekap_tryout";
    protected $fillable = ["user_id", "jumlah_benar", "jumlah_salah", "skor"];
}
