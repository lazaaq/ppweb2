@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex align-items-center mt-5">
    <div class="container">
        <div class="card">
            <form action="/buku/{{$buku->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header bg-primary text-light">
                    Edit Buku
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $buku->judul }}" placeholder="Judul Buku">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ $buku->penulis }}" placeholder="Penulis Buku">
                        @error('penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $buku->harga }}" placeholder="Harga Buku">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                        <input type="text" class="date form-control @error('tgl_terbit') is-invalid @enderror" id="tgl_terbit" name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
                        @error('tgl_terbit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Buku</label>
                        <img src="{{ asset($buku->foto) }}" alt="{{ $buku->judul }}" width="500px" class="d-block">
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Foto Buku">
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/buku" class="btn btn-danger">Batal</a>        
                    <button type="submit" class="btn btn-primary">Submit</button>        
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