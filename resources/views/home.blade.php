@extends('app')
@section('content')
    @auth
        <hr>
        <p>Welcome <b>{{ Auth::user()->name }}</b></p>

        <h3>Add new task</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/todos') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="task" placeholder="Add new task">
            <button class="btn btn-primary" type="submit">Store</button>
        </form>
        <hr>

        <h3>The todos</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item">
                    {{ $todo->task }}
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                        Edit
                    </button>
                    <form action="{{ url('todos/' . $todo->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                        <div class="card card-body">
                            <form action="{{ url('todos/' . $todo->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="task" value="{{ $todo->task }}">
                                <button class="btn btn-secondary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    @endauth
    @guest
        <p class="text-white">To unlock all features, please login first</p>
        <a class="btn btn-dark text-white" href="{{ route('login') }}">Login</a>
    @endguest
@endsection