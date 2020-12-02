<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodo;
use App\Http\Requests\UpdateTodo;
use App\Http\Resources\Todo as TodoResource;
use App\Models\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Todo::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TodoResource::collection(
            Todo::all()->where('author_id', auth()->user()->id)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodo $request)
    {
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->author_id = $request->user()->id;
        $todo->schedule_date = $request->schedule_date;
        $todo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodo $request, Todo $todo)
    {
        $todo->name = $request->name;
        $todo->schedule_date = $request->schedule_date;
        $todo->save();

        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return new TodoResource($todo);
    }
}
