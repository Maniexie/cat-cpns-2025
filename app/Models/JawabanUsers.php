<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanUsers extends Model
{
    protected $table = "jawaban_users";
    protected $fillable = ["user_id", "paket_tryout_id", "bank_soal_id", "jawaban", "skor"];
}
