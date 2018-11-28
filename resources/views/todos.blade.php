@extends('layout')

@section('title', 'Todos')

@section('content')
<div class="row mt-3">
    <div class="col">
        <div class="card">
                <div class="card-header">
                    <form action="/create/todos" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" name="todo" placeholder="Create a New Todo">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">Add Todo</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @foreach ($todos as $todo)
                    @if (!$todo->completed)
                        <ul class="list-group">
                            <li class="list-group-item">
                            {{ $todo->todo }}<br/>
                            <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger float-right btn-sm">X</a>
                            <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-warning float-right btn-sm">Update</a>
                            <a href="{{ route('todo.completed', ['id' => $todo->id]) }}" class="btn btn-info float-right btn-sm">Mark Complete</a>
                            </li>
                        </ul>
                        @endif
                    @endforeach
                </div>
            </div>
    </div>
    <div class="col">
        <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Completed</h2>
                </div>
                <div class="card-body">
                    @foreach ($todos as $todo)
                    @if ($todo->completed)
                    <ul class="list-group">
                            <li class="list-group-item">
                                {{ $todo->todo }}<br/>
                                <a href="{{ route('todo.incompleted', ['id' => $todo->id]) }}" class="btn btn-dark btn-block btn-sm">Mark InComplete</a>
                            </li>
                        </ul>
                    @endif
                    @endforeach
                </div>
            </div>
    </div>
</div>
        
        
                
@endsection