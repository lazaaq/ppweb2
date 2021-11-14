<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 4;
        $galeri = Galeri::with('bukus')->orderBy('id', 'desc')->paginate($batas);
        return view('galeri.index', compact([
            'galeri'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'id_buku' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $galeri = New Galeri();
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        $galeri->galeri_seo = Str::of($request->nama_galeri)->slug('-');

        $file = $request->file('foto');
        $folder_tujuan = 'thumb';
        $filename = time() . '_' . $file->getClientOriginalName();
        $galeri->foto = $file->move($folder_tujuan, $filename);

        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::all();
        $galeri = Galeri::find($id);
        return view('galeri.edit', compact('buku', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'id_buku' => 'required',
        ]);
        $galeri = Galeri::find($id);
        
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $folder_tujuan = 'thumb';
            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->move($folder_tujuan, $filename);
            File::delete($galeri->foto);
            $galeri->update([
                'foto' => $filepath
            ]);
        }
        
        $galeri->update([
            'nama_galeri' => $request->nama_galeri,
            'id_buku' => $request->id_buku,
            'keterangan' => $request->keterangan,
            'galeri_seo' => Str::of($request->nama_galeri)->slug('-')
        ]);
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        File::delete($galeri->foto);
        $galeri->delete();
        return redirect('/galeri')->with('pesan', 'Galeri berhasil dihapus!');
    }
}
