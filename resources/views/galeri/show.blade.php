@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header lead">
                Detail Galeri
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Nama Galeri</div>
                    <div class="value col-7 col-md-10">: <b>{{$galeri->nama_galeri}}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">SEO Galeri</div>
                    <div class="value col-7 col-md-10">: <b>{{$galeri->galeri_seo}}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Keterangan Galeri</div>
                    <div class="value col-7 col-md-10">: <b>{{$galeri->keterangan}}</b></div>
                </div>
                <div class="mb-3 row">
                    <div class="label col-5 col-md-2">Foto Galeri</div>
                    <div class="value col-7 col-md-10">: <img src="{{ asset($galeri->foto) }}" alt="{{ $galeri->nama_galeri }}" width="500px"></b></div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('galeri.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        
    </div>
</div>
@endsection