<?php

namespace todo\Http\Controllers;

use Illuminate\Http\Request;
use todo\Task;
use todo\Console\Commands\todonew;
use todo\Console\Commands\todoedit;
use todo\Console\Commands\tododelete;

class todoCnt extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Task::get();

        return view('todo/index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todoCommand = new todonew(0, $request->input('task_name'));
        $this->dispatch($todoCommand);

        return \Redirect::route('todo.index')->with('message', $request->input('task_name').' was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $todo = Task::find($id);

      return view('todo/show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $todo = Task::find($id);

      return view('todo/edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todoCommand = new todoedit($id, $request->input('task_name'));
        $this->dispatch($todoCommand);

        return \Redirect::route('todo.index')->with('message', 'Task '.$id.' was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $todoCommand = new tododelete($id);
      $this->dispatch($todoCommand);

      return \Redirect::route('todo.index')->with('message', 'Task '.$id.' was deleted');
    }
}
