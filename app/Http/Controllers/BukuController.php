<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

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
            ]
        );

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
}
