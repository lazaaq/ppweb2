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

    <h1>Galeri</h1>

    <div class="mt-3 text-right">
        <a href="/galeri/create" class="btn btn-primary" style="width: fit-content;">Buat Galeri Baru</a>
    </div>
 
    <table class="table table-stripped table-hover mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Galeri</th>
                <th>Nama Buku</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galeri as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama_galeri }}</td>
                <td>{{ $data->bukus->judul }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#{{ 'gambar' . $data->id }}">
                        Lihat
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'gambar' . $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $data->nama_galeri }}</h5>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($data->foto) }}" alt="" width="100%">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="d-flex">
                    <a href="{{ route('galeri.show', $data->id) }}" class="btn btn-info text-light mr-2">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-warning mr-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('galeri.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-3">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>{{ $galeri->links() }}</div>

</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection