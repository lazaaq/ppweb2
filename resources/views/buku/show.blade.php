@extends('layout.main')

@section('contents')
<div class="d-flex align-items-center mt-5">
    <div class="container">
        <div class="mb-3 row">
            <div class="label col-2">Judul</div>
            <div class="value col-10">: {{$buku->judul}}</div>
        </div>
        <div class="mb-3 row">
            <div class="label col-2">Penulis</div>
            <div class="value col-10">: {{$buku->penulis}}</div>
        </div>
        <div class="mb-3 row">
            <div class="label col-2">Judul</div>
            <div class="value col-10">: {{ "Rp ".number_format($buku->harga, 2, ',', '.' ) }}</div>
        </div>
        <div class="mb-3 row">
            <div class="label col-2">Tanggal Terbit</div>
            <div class="value col-10">: {{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</div>
        </div>
    </div>
</div>
@endsection