@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <h2>{{ $bukus->judul }}</h2>
    <hr>
    <div class="row">
        @foreach ($galeris as $galeri)
            <div class="col-md-4">
                <a href="{{ asset('images/' . $galeri->foto) }}" data-lightbox="image-1" data-title="{{ $galeri->keterangan }}">
                    <img src="{{ asset('images/' . $galeri->foto) }}" style="width:200px; height:150px;">
                </a>
                <p>
                    <h5>{{ $galeri->nama_galeri }}</h5>
                </p>
            </div>
        @endforeach
        <div>{{ $galeris->links() }}</div>
    </div>
</div>
@endsection