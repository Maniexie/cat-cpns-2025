<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTryout extends Model
{
    protected $table = "hasil_tryout";
    protected $fillable = ["user_id", "bank_soal_id", "jawaban_user", "jawaban_benar", "is_correct"];
}
