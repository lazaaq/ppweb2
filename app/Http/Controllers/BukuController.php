<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Galeri;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_buku = Buku::orderBy('id', 'desc')->paginate(5);
        $banyak_buku = Buku::all()->count();
        $no = 0;
        return view('buku.index', compact(
            'data_buku',
            'banyak_buku',
            'no',
        ));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'judul' => 'required|string',
                'penulis' => 'required|string',
                'harga' => 'required|numeric',
                'tgl_terbit' => 'required|date',
                'buku_seo' => 'required|string',
                'foto' => 'required'
            ]
        );

        $file = $request->file('foto');
        $folder_tujuan = 'thumb';
        $filename = time() . '_' . $file->getClientOriginalName();
        $validatedData['foto'] = $file->move($folder_tujuan, $filename);

        Buku::create($validatedData);

        return redirect('/buku')->with('success', 'Data Buku berhasil ditambah!');
    }

    public function show(Buku $buku)
    {
        return view('buku/show', compact(
            'buku',
        ));
    }

    public function edit(Buku $buku)
    {
        return view('buku/edit', compact(
            'buku',

        ));
    }

    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required',
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $folder_tujuan = 'thumb';
            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->move($folder_tujuan, $filename);
            File::delete($buku->foto);
            $buku->update([
                'foto' => $filepath
            ]);
        }

        $buku->update($validatedData);

        return redirect('/buku')->with('success', 'Data berhasil diubah!');
    }

    public function delete(Buku $buku)
    {
        $buku->delete();
        return redirect('/buku')->with('success', 'Data berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->search;
        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')->orWhere('penulis', 'like', '%' . $cari . '%')->paginate($batas);
        $banyak_buku = $data_buku->count();
        $no = ($data_buku->currentPage() - 1);
        return view('buku.search', compact('banyak_buku', 'data_buku', 'no', 'cari'));
    }

    public function buku()
    {
        return view('buku.buku', [
            'bukus' => Buku::paginate(12)
        ]);
    }

    public function galbuku($title)
    {
        $bukus = Buku::where('buku_seo', $title)->first();
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        return view('buku.galeri', compact('bukus', 'galeris'));
    }
}
