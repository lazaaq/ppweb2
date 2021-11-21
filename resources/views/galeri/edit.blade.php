@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex align-items-center mt-5 mb-5">
    <div class="container">
        <div class="card">
            <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header bg-primary text-light">
                    Edit Galeri
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_galeri" class="form-label">Nama Galeri</label>
                        <input type="text" name="nama_galeri" id="name_galeri" class="form-control" placeholder="Nama Galeri" value="{{ $galeri->nama_galeri }}">
                        @error('nama_galeri')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Buku</label>
                        <select name="id_buku" id="id_buku" class="form-control">
                            @foreach ($buku as $data)
                                <option value="{{ $data->id }}" @if($galeri->id_buku == $data->id) selected @endif>{{ $data->judul }}</option>                        
                            @endforeach
                        </select>
                        @error('id_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan Galeri">{{ $galeri->keterangan }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto</label>
                        @if($galeri->foto != NULL)
                        <img src="{{ asset($galeri->foto) }}" alt="{{ $galeri->nama_galeri }}" width="400px" class="img-thumbnail d-block">
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="mb-3">
                        <a href="/galeri" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: 'true'
    });
</script>
@endsection