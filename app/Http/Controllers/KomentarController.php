<?php

namespace App\Http\Controllers;

use App\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'komentar' => 'required',
        ]);
        Komentar::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komentar $komentar)
    {
        //
    }
}
