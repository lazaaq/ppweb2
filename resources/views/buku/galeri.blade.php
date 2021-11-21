@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku : {{ $bukus->judul }}</h2>
        <hr>
        <div class="row">
            @if(count($galeris) != 0)
            @foreach ($galeris as $galeri)
            <div class="col-md-4">
                <a href="{{ asset($galeri->foto) }}" data-lightbox="image-1" data-title="{{ $galeri->keterangan }}">
                    <img src="{{ asset($galeri->foto) }}" style="width:200px; height:150px;">
                </a>
                <p>
                    <h5>{{ $galeri->nama_galeri }}</h5>
                </p>
            </div>
            @endforeach
            @else
            <p class="text-center lead w-100 text-info">Galeri Kosong</p>
            @endif
            <div>{{ $galeris->links() }}</div>
        </div>
    </div>
</section>
@endsection