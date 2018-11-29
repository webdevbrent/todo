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
                            <ul class="list-group">
                                @forelse ($incompleted as $incomplete)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $incomplete->todo }}
                                    <span class="badge">
                                            <a href="{{ route('todo.completed', ['id' => $incomplete->id]) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="You Complete Me!">
                                               <i class="far fa-check-circle"></i>
                                            </a>
                                            <a href="{{ route('todo.update', ['id' => $incomplete->id]) }}" 
                                               class="btn btn-warning btn-sm"
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Change Me!">
                                               <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{ route('todo.delete', ['id' => $incomplete->id]) }}" 
                                               class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Trash Me!">
                                               <i class="fas fa-trash"></i>
                                            </a>                                       
                                    </span>
                                </li>
                                @empty
                                <p>No Todos.....yet!!!</p>
                                @endforelse
                               
                            </ul>
                    </div>
                    
            </div>
      </div>
      <div class="col">
          <div class="card">
              <div class="card-header text-center">
                    <h2>Completed</h2>
              </div>
                <div class="card-body">
                        <ul class="list-group">
                            @forelse ($completed as $complete)
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-danger text-white">
                                <s>{{ $complete->todo }}</s>
                                <span class="badge">
                                    <a href="{{ route('todo.incompleted', ['id' => $complete->id]) }}" 
                                       class="btn btn-dark btn-sm"
                                       data-toggle="tooltip" 
                                       data-placement="top" 
                                       title="Put Me Back!">
                                       <i class="fas fa-undo"></i>
                                    </a>
                                </span>
                                
                            </li>
                            @empty
                            <p>Nothing Completed!! Do something already!</p>
                            @endforelse
                        </ul>
                </div>
          </div>
      </div>
</div>         
@endsection