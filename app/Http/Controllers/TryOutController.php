<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\HasilTryout;
use App\Models\JawabanUsers;
use App\Models\RekapTryout;
use App\Models\TryOut;
use App\Models\User;
use Illuminate\Http\Request;

class TryOutController extends Controller
{
    public function mulaiTryOut(Request $request)
    {
        $tryoutId = TryOut::findOrFail($request->id);
        return view('tryout.mulai_tryout', compact('tryoutId'));
    }

    public function simpanJawaban(Request $request)
    {
        $request->validate([
            'bank_soal_id' => 'required|integer',
            'paket_tryout_id' => 'required|integer',
            'jawaban' => 'nullable|string|max:1'
        ]);

        // $pesertaId = auth()->id(); // ambil user login

        $pesertaId = User::where('id', $request->peserta_id)->first()->id;

        // Simpan atau update jawaban
        JawabanUsers::updateOrCreate(
            [
                'user_id' => $pesertaId,
                'paket_tryout_id' => $request->paket_id,
                'bank_soal_id' => $request->soal_id,
            ],
            [
                'jawaban' => $request->jawaban
            ]
        );

        return response()->json(['success' => true]);
    }


    public function simpanHasil(Request $request)
    {

        // $userId = auth()->id();
        $userId = $request->user()->id;
        // $userId = session('user_id'); 
        // ambil user login
        $answers = $request->input('answers', []);
        echo 'userId=' . $userId . '';

        $jumlahBenar = 0;
        $jumlahSalah = 0;

        foreach ($answers as $key => $jawabanPeserta) {

            $soalId = (int) str_replace('soal', '', $key);   // Ambil soal_id dari key, misalnya "soal15" → 15


            $soal = BankSoal::find($soalId);

            $isCorrect = $jawabanPeserta == $soal->jawaban_benar;
            echo 'key' . $key . 'isCorrect' . $isCorrect . '';

            if ($isCorrect) {
                $jumlahBenar++;
            } else {
                $jumlahSalah++;
            }

            // simpan per soal
            HasilTryout::updateOrCreate(
                [
                    'user_id' => $userId,
                    'bank_soal_id' => $soalId,
                ],
                [
                    'jawaban_user' => $jawabanPeserta,
                    'jawaban_benar' => $soal->jawaban_benar,
                    'is_correct' => $isCorrect,
                ]
            );

        }

        // simpan rekap total
        RekapTryout::updateOrCreate(
            ['user_id' => $userId],
            [
                'jumlah_benar' => $jumlahBenar,
                'jumlah_salah' => $jumlahSalah,
                'skor' => $jumlahBenar, // bisa pakai rumus lain
            ]
        );

        return response()->json([
            'status' => 'success',
            'skor' => $jumlahBenar
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tryout.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
