<?php

namespace App\Http\Controllers;

use App\Models\KategoriSoal;
use App\Models\PaketTryout;
use App\Models\PaketTryoutKategori;
use Illuminate\Http\Request;

class PaketTryoutKategoriController extends Controller
{
    public function showTambahPaketTryoutKategori(Request $request)
    {
        $paketTryout = PaketTryout::all();
        echo "paket tryout kategori $paketTryout";
        $kategoriSoal = KategoriSoal::all();
        return view("tryout.tambah_paket_tryout_kategori", compact("paketTryout", "kategoriSoal"));
    }

    public function storePaketTryoutKategori(Request $request)
    {
        $paketTryoutKategoriStore = $request->validate([
            "paket_tryout_id" => "required",
            "kategori_soal_id" => "required",
            "jumlah_soal" => "required",
        ]);

        PaketTryoutKategori::create($paketTryoutKategoriStore);
        return redirect('/tryout')->with("success", "berhasil menambahkan paket tryout kategori");
    }
}
