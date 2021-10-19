@extends('layout.main')

@section('contents')
<div class="d-flex align-items-center mt-5">
    <div class="container">
        <h1>EDIT</h1>
        <form action="/buku/{{$buku->id}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required value="{{ $buku->judul }}">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required value="{{ $buku->penulis }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required value="{{ $buku->harga }}">
            </div>
            <div class="mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" required value="{{ $buku->tgl_terbit }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection