<?php

namespace App\Http\Controllers;
use App\Todos;
//use App\Providers\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todos::all();
        return response()->json($todos);
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
       $todo = Todos::create($request->all());
        
            
            return response()->json($todo);
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $todo_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $todo_id
     * @return \Illuminate\Http\Response
     */
    public function edit($todo_id)
    {
        $todo = Todos::find($todo_id);
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $todo_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todo_id)
    {
        $todo = Todos::find($todo_id);
        $todo->title= request('title');
        $todo->desc= request('desc');
        $todo->deadline= request('deadline');
        return response()->json($todo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $todo_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($todo_id)
    {
        $todo = Todos::find($todo_id);
        if($todo->delete()){
            return $this->refresh();
        } else{
            return response()->json( ['error' => 'destroy method has failed.'],425);
        }
    }
}
