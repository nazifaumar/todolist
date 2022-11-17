@extends('app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <div class="container">
                <main class="form-login">
                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark" type="username" name="username" value="{{ old('username') }}"
                                placeholder="username" autofocus />
                            <label class="text-white">Username <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark" type="password" name="password" placeholder="password" />
                            <label class="text-white">Password <span class="text-danger">*</span></label>
                        </div>
                        <button class="w-100 btn btn-lg btn-dark mt-4" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center text-white mt-3">Belum punya akun? <a href="/register">Register</a></small>
                 </main>
            </div>
        </div>
    </div>
@endsection