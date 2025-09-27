<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSoal extends Model
{
    protected $table = "kategori_soal";
    protected $fillable = ["nama", "passing_grade"];
    public function bankSoal()
    {
        return $this->hasMany(KategoriSoal::class, "kategori_soal_id");
    }
}
