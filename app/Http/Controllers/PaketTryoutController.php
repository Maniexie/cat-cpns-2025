<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\KategoriSoal;
use App\Models\PaketTryout;
use App\Models\TryOut;
use Illuminate\Http\Request;

class PaketTryoutController extends Controller
{
    public function showPaketTryout(Request $request)
    {
        $showPaketTryout = PaketTryout::get()->all();

        return view("tryout.index", compact("showPaketTryout"));
    }
    public function showTambahPaketTryout(Request $request)
    {
        return view("tryout.tambah_paket_tryout");

    }

    public function storePaketTryout(Request $request)
    {
        $paketTryout = $request->validate([
            "nama_paket_tryout" => "required",
        ]);
        // dd($paketTryout);
        PaketTryout::create($paketTryout);
        return redirect("/tryout")->with("success", "berhasil menambahkan paket tryout");
    }


    public function showDetailPaketTryout($id)
    {
        $detailPaketTryout = PaketTryout::findOrFail($id);
        // $tryoutId = TryOut::findOrFail($detailPaketTryout->id);
        // echo "detail paket tryout $id";
        // dd($detailPaketTryout);
        if ($detailPaketTryout) {
            return view("tryout.detail_paket_tryout", compact("detailPaketTryout"));
        } else {
            return redirect("/tryout");
        }
    }


    public function showIsiPaketTryout($id)
    {
        $bankSoal = BankSoal::where("paket_tryout_id", $id)->get()->all();
        return view("tryout.isi_paket_tryout", compact("bankSoal"));
    }

    public function mulaiTryout(Request $request, $id)
    {
        // Ambil paket tryout
        $paketTryout = PaketTryout::findOrFail($id);

        // Ambil semua soal dalam paket
        $bankSoal = BankSoal::where('paket_tryout_id', $id)->get();
        echo 'query' . $bankSoal;



        return view('tryout.mulai_tryout', [
            'paketTryout' => $paketTryout,
            'bankSoal' => $bankSoal,
            'totalSoal' => $bankSoal->count(),
            'durasi' => 90 // menit, bisa ambil dari tabel paket
        ]);
    }

}
