<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\KategoriSoal;
use App\Models\PaketTryout;
use Illuminate\Http\Request;

class BankSoalController extends Controller
{
    public function showFormCreateSoal()
    {
        $kategoriSoal = KategoriSoal::all();
        $paketTryout = PaketTryout::all();
        // dd($kategoriSoal, $paketTryout);

        return view("bank_soal.create", compact("kategoriSoal", "paketTryout"));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriSoal = KategoriSoal::all();
        $createSoal = new BankSoal();
        dd($createSoal);
        return view("bank_soal.create", compact("createSoal", "kategoriSoal"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createBankSoal(Request $request)
    {
        $soal = $request->validate([
            "kategori_soal_id" => "required",
            "paket_tryout_id" => "required",
            "pertanyaan" => "required",
            "opsi_a" => "required",
            "opsi_b" => "required",
            "opsi_c" => "required",
            "opsi_d" => "required",
            "opsi_e" => "required",
            "jawaban_benar" => "required",
            "pembahasan" => "required",
            "bobot_opsi" => "required"
        ]);

        // dd($soal);

        BankSoal::create($soal);
        return redirect("/create-soal")->with("success", "Sukses menambahkan soal");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
