<?php

namespace App\Http\Controllers;
use App\Todo;
use App\User;

use Illuminate\Http\Request;
use Validator;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return response()->json($user->todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            //create a todo
            $todo = new Todo;
            $todo->user_id = auth()->user()->id;
            $todo->title = $request->input('title');
            $todo->description = $request->input('description');
            $todo->status_id = $request->input('status_id');
            $todo->priority = $request->input('priority');
            $todo->comments = $request->input('comments');
            $todo->save();
            return response()->json($todo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            //update a todo
            $todo = Todo::find($id);
            $todo->title = $request->input('title');
            $todo->description = $request->input('description');
            $todo->status_id = $request->input('status_id');
            $todo->priority = $request->input('priority');
            $todo->comments = $request->input('comments');
            $todo->save();
            return response()->json($todo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find an item
        $todo = Todo::find($id);
        $todo->delete();
        $response = array('response' => 'Todo deleted ...', 'success' => true);
        return $response;
    }
}
