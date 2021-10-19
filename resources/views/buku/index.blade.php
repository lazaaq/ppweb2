@extends('layout.main')

@section('contents')
<div class="container my-3">
    @if (session()->has('success_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_added') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('success_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_updated') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('success_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="row my-5">
        <a href="/buku/create" class="btn btn-primary" style="width: fit-content;">Buat Buku Baru</a>
    </div>

    <table class="table table-stripped">
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
                    <a href="/buku/{{$buku->id}}" class="btn btn-success me-3">Lihat</a>
                    <a href="/buku/edit/{{$buku->id}}" class="btn btn-warning me-3">Edit</a>
                    <form action="/buku/delete/{{$buku->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger me-3">Delete</button>
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