@extends('layouts.app')

@section('content')
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
        <a href="/galeri/create" class="btn btn-primary" style="width: fit-content;">Buat Galeri Baru</a>
    </div>

    <table class="table table-stripped">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ 'gambar' . $data->id }}">
                        Lihat
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'gambar' . $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                    <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-warning me-3">Edit</a>
                    <form action="{{ route('galeri.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-3">Delete</button>
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