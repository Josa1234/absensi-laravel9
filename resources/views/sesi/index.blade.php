@extends('layouts.sesi')

@section('content')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        @include('partials.error')
        <h1 class="text-center text-dark">Log in</h1>
        <form action="/sesi/login" method="POST">
            @csrf
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
                <button type="submit" class="btn btn-primary text-center">Log in</button>
            </div>
        </form>

        <p class="text-center text-dark mt-5">Don't have an account? <a href="{{ '/sesi/register' }}">Sign up</a></p>
    </div>
@endsection
