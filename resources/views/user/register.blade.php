@extends('app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <div class="container">
                <main class="form-register">
                    <form action="{{ route('register.action') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark"  type="text" name="name" value="{{ old('name') }}"
                                placeholder="name" autofocus />
                            <label class="text-white">Name <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark" type="username" name="username" value="{{ old('username') }}"
                                placeholder="username" />
                            <label class="text-white">Username <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark" type="password" name="password" placeholder="password" />
                            <label class="text-black">Password <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control mt-2 opacity-25 btn-outline-dark" type="password" name="password_confirm"
                                placeholder="password_confirm" />
                            <label class="text-white">Password Confirmation<span class="text-danger">*</span></label>
                        </div>
                        <button class="w-100 btn btn-lg btn-dark mt-4">Register</button>
                    </form>
                    <small class="d-block text-center text-dark mt-3">Sudah punya akun? <a href="/login">Login</a></small>
                </main>
            </div>
        </div>
    </div>
    </div>
@endsection