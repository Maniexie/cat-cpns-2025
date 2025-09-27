<?php

namespace App\Http\Controllers;

use App\Models\KategoriSoal;
use Illuminate\Http\Request;

class KategoriSoalController extends Controller
{
    public function showFormCategorySoal()
    {
        return view("bank_soal.category");
    }

    public function createCategorySoal(Request $request)
    {
        $data = $request->validate([
            "nama" => "required",
            "passing_grade" => "required",
        ]);

        // dd($data);
        KategoriSoal::create($data);
        return redirect("/category-soal")->with("success", "Sukses menambahkan kategori soal");

    }
}
