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
    <h1>Users</h1>
    <form action="/users/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="level" id="level1" value="admin">
                <label class="form-check-label" for="level1">
                    Admin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="level" id="level2" value="user" checked>
                <label class="form-check-label" for="level2">
                    User
                </label>
            </div>
        </div>
        <div class="mb-3">
            <a href="/users" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>


</div>
@endsection