<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketTryout extends Model
{
    protected $table = "paket_tryout";

    // protected f
    protected $fillable = ["nama_paket_tryout"];

    public function bankSoal()
    {
        return $this->hasMany(BankSoal::class, 'paket_tryout_id');
    }
}
