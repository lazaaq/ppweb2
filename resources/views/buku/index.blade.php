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

    <div class="search mt-3">
        <form class="d-flex" type="search" action="{{route('buku.search')}}" method="get">
            <input class="form-control me-2" name="search" id="search" placeholder="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <table class="table table-stripped mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
            <tr>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 0, ',', '.' ) }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td class="d-flex">
                    <a href="/buku/{{$buku->id}}" class="btn btn-info mr-2 text-light">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="/buku/edit/{{$buku->id}}" class="btn btn-warning mr-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/buku/delete/{{$buku->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
            $no += $buku->harga;
            ?>
            @endforeach
        </tbody>
    </table>
    <div>{{ $data_buku->links() }}</div>

    <h6>Ada {{$banyak_buku}} buku</h6>
    <h6>Total Harga : {{ "Rp ".number_format($no, 2, ',', '.' ) }}</h6>

</div>


@endsection