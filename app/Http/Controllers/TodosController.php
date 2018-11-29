<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        $todo_completed = Todo::latest()->where('completed', true)->get();
        $todo_incomplete = Todo::latest()->where('completed', false)->get();

        return view('todos')->with([
            'completed' => $todo_completed, 
            'incompleted' => $todo_incomplete
            ]);
    }
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }
    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->back();
    }
    public function update($id)
    {
        $todo = Todo::find($id);
        
        return view('update')->with('todo', $todo);
    }
    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->route('todos');
    }
    public function completed($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 1;
        $todo->save();

        return redirect()->back();
    }
    public function incompleted($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 0;
        $todo->save();

        return redirect()->back();
    }
}
