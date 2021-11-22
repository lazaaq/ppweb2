@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku : {{ $buku->judul }}</h2>
        <hr>
        @if(count($galeris) != 0)
        <div class="row justify-content-center">
            @foreach ($galeris as $galeri)
            <div class="col-md-4">
                <a href="{{ asset($galeri->foto) }}" data-lightbox="image-1" data-title="{{ $galeri->keterangan }}">
                    <img src="{{ asset($galeri->foto) }}" style="width:200px; height:150px;" class="rounded">
                </a>
                <p>
                    <h5>{{ $galeri->nama_galeri }}</h5>
                </p>
            </div>
            
            @endforeach
        </div>
        <div class="like">
            <a href="/buku/{{ $buku->id }}/suka" class="btn border-1">
                <i class="bi bi-heart"></i>
                <span class="badge badge-light">{{ $buku->suka }}</span>
            </a>
        </div>
        @else
        <p class="text-center lead w-100 text-info">Galeri Kosong</p>
        @endif
        <div>{{ $galeris->links() }}</div>
        <br>
        <form action="/buku/{buku}/komentar" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="buku_id" value="{{ $buku->id }}">
            <label for="komentar" class="form-label lead">Komentar</label>
            <textarea name="komentar" id="komentar" rows="5" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
        @if (count($komentars) != 0)
            @foreach ($komentars as $komentar)
                <div class="card py-3 px-3 text-left mb-3" style="background-color: #242424; color:white;">
                    <div class="card-title">{{ $komentar->user->name }}</div>
                    <div class="card-text">Komentar : {{ $komentar->komentar }}</div>
                </div>
            @endforeach
        @else
        <p class="text-center lead w-100 text-info">Komentar Kosong</p>
        @endif
    </div>
</section>
@endsection