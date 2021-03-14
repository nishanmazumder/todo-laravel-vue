<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::orderBy('completed_at', 'DESC')->get();

        //return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->name = $request->item['name'];
        $todo->save();

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Todo $todo)
    // {
    //     // No need to query
    //     //$todoItem = Todo::find($todo);

    //     if($todo){
    //         $todo->completed = $request->item['completed'] ? true : false;
    //         $todo->completed_at = $request->item['completed'] ? Carbon::now() : null;
    //         $todo->save();

    //         return $todo;
    //     }

    //     return "Item not found.";
    // }
    public function update(Request $request, $todo)
    {
        // No need to query
        $todoItem = Todo::find($todo);

        // if($request('completed') === true)
        // {
        //     $todoItem->completed = 1;
        // }else{
        //     $todoItem->completed = 0;
        // }

        // $todoItem->save();

        // if($todoItem){
        //     $todoItem->completed2 = $request->item === 0 ? 0 : 1;
        //     $todoItem->completed_at = $request->item ? Carbon::now() : null;
        //     $todoItem->save();

        //     return $todoItem;
        // }

        // return "Item not found.";

        // if($todoItem){
        //     $todoItem->completed = $request->item['completed'] ? true : false;
        //     $todoItem->completed_at = $request->item ? Carbon::now() : null;
        //     $todoItem->save();

        //     return $todoItem;
        // }

        if($todoItem){
            if($request->item['activated'] === true){
                $todoItem->activated = 1;
            }else{
                $todoItem->activated = 0;
            }
            $todoItem->completed_at = $request->item ? Carbon::now() : null;
            $todoItem->save();

            return $todoItem;
        }



        return "Item not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($todo)
    {
        $todoItem = Todo::find($todo);

        if($todoItem){
            $todoItem->delete();
            return "Item deleted";
        }

        return "Item not found";

    }
}
