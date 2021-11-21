@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header lead">
                Buku
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Judul</div>
                    <div class="value col-7 col-md-10">: <b>{{$buku->judul}}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Penulis</div>
                    <div class="value col-7 col-md-10">: <b>{{$buku->penulis}}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Judul</div>
                    <div class="value col-7 col-md-10">: <b>{{ "Rp ".number_format($buku->harga, 2, ',', '.' ) }}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Tanggal Terbit</div>
                    <div class="value col-7 col-md-10">: <b>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</b></div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('buku') }}" class="btn btn-primary">Kembali</a>
                <a href="/detail-buku/{{ $buku->buku_seo }}" class="btn btn-info text-light">Lihat Galeri</a>
            </div>
        </div>
        
    </div>
</div>
@endsection