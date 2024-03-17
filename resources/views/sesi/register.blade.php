@extends('layouts.sesi')

@section('content')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        @include('partials.error')
        <h1 class="text-center text-dark">Sign up</h1>
        <form action="/sesi/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label text-dark">Name</label>
                <input type="text" class="form-control" value="{{ Session::get('name') }}" name="name"
                    id="exampleInputName">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-dark">Email</label>
                <input type="email" class="form-control" value="{{ Session::get('email') }}" name="email"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-dark">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
        </form>
        <p class="text-center text-dark mt-5">Have an account? <a href="{{ '/sesi' }}">Log in</a></p>
    </div>
@endsection
