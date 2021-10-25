@extends('layout.main')

@section('contents')
<div class="container my-3">
    <div class="row my-5">
        <a href="/buku/create" class="btn btn-primary" style="width: fit-content;">Buat Buku Baru</a>
    </div>

    <div class="search">
        <form class="d-flex" type="search" action="{{route('buku.search')}}" method="get">
            <input class="form-control me-2" name="search" id="search" value="{{$cari}}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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