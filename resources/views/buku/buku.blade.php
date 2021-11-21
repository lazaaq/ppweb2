@extends('layouts.app')

@section('css')
<style>
    html,
    body {
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}
</style>
@endsection

@section('content')
<div class="container my-3">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <span class="">{{ session('success') }}</span>
        <button type="button" class="btn-close ml-auto d-block" data-bs-dismiss="alert" aria-label="Close" style="border:0; border-radius:4px;background-color:white;">X</button>
    </div>
    @endif

    <h1>Buku</h1>

    <div class="mt-3 text-right">
        <a href="/buku/create" class="btn btn-primary" style="width: fit-content;">Buat Buku Baru</a>
    </div>

    <div class="row mt-3">
        @foreach ($bukus as $buku)
        <div class="col-md-4">
            <div class="card">
                <a href="/detail-buku/{{ $buku->buku_seo }}">
                    <img src="{{ asset($buku->foto) }}" class="card-img-top" alt="{{ $buku->judul }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $buku->judul }}</h5>
                    <p class="mb-1">Penulis : {{ $buku->penulis }}</p>
                    <p class="mb-3">Harga : Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                    <a href="/detail-buku/{{ $buku->buku_seo }}" class="btn btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="/buku/edit/{{ $buku->id }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/buku/{{ $buku->id }}/destroy" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                    </form>
                </div>
            </div>    
        </div>
        @endforeach
    </div>
    <div>{{ $bukus->links() }}</div>


</div>


@endsection