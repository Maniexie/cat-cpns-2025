<?php

namespace App\Http\Controllers;

use App\Models\TryOut;
use Illuminate\Http\Request;

class TryOutController extends Controller
{
    public function mulaiTryOut(Request $request)
    {
        $tryoutId = TryOut::findOrFail($request->id);
        return view('tryout.mulai_tryout', compact('tryoutId'));
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
