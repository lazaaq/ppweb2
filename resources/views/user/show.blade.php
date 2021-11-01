@extends('layouts.app')

@section('title', 'Users')

@section('css')
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Detail User</h1>
    <div class="row mb-3">
        <div class="col-2">
            Id
        </div>
        <div class="col-10">
            {{ $user->id }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            Name
        </div>
        <div class="col-10">
            {{ $user->name }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            Email
        </div>
        <div class="col-10">
            {{ $user->email }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            Level
        </div>
        <div class="col-10">
            {{ $user->level }}
        </div>
    </div>
    <div class="row mb-3">
        <a href="#" class="btn btn-warning">Edit</a>
        <a href="#" class="btn btn-danger">Hapus</a>
    </div>
</div>
@endsection