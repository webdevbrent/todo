@extends('layout')

@section('title', 'Todos')

@section('content')
        <div class="card">
            <div class="card-body">
            <form action="{{ route('todo.save', ['id' => $todo->id])}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" name="todo" value="{{ $todo->todo }}" placeholder="Create a New Todo">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Update Todo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
@endsection