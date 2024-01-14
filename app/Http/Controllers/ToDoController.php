<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $to_dos = ToDo::all();

        return view('welcome', [
            'to_dos' => $to_dos
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        ToDo::create($attributes);

        return redirect('/');
    }

    public function update(ToDo $ToDo)
    {
        $ToDo->update(['isDone' => true]);

        return redirect('/');
    }

    public function destroy(ToDo $ToDo)
    {
        $ToDo->delete();

        return redirect('/');
    }
}
