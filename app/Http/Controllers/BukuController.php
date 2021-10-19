<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
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
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        Buku::create($validatedData);

        return redirect('/buku')->with('success_added', 'Data Buku berhasil ditambah!');
    }

    public function show(Buku $buku)
    {
        return view('buku/show', compact(
            'buku',
        ));
    }

    public function edit(Buku $buku)
    {
        return view('buku/edit' , compact(
            'buku',

        ));
    }

    public function update(Request $request, Buku $buku){
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'harga' => 'required|string',
            'penulis' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku->update($validatedData);

        return redirect('/buku')->with('success_updated', 'Data berhasil diubah!');
    }

    public function delete(Buku $buku)
    {
        $buku->delete();
        return redirect('/buku')->with('success_deleted', 'Data berhasil dihapus!');
    }
}