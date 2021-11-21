@extends('layouts.app')

@section('title', 'Users')

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
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <span class="">{{ session('success') }}</span>
        <button type="button" class="btn-close ml-auto d-block" data-bs-dismiss="alert" aria-label="Close" style="border:0; border-radius:4px;background-color:white;">X</button>
    </div>
    @endif

    <h1>Users</h1>

    <div class="tambah text-right">
        <a href="/users/create" class="btn btn-primary">Buat User</a>
    </div>
    <table class="table table-hover mt-3">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->level}}</td>
            <td>
                <a href="/users/{{$user->id}}" class="btn btn-info text-light">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="/users/{{$user->id}}/edit" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="/users/{{ $user->id }}" method="POST" class="d-inline-block">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection