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
        $data = [];
        $data2 = [];
        foreach($user->todos as $todo) {
            $todo->action ='<td class="menu-action">
                <a href="/manage/todo/'.$todo->id.'" 
                   onclick="event.preventDefault();" 
                   data-original-title="view" data-toggle="tooltip" 
                   data-placement="top" data-id="'.$todo->id.'" 
                   class="viewLink btn menu-icon vd_bd-green vd_green btn-sm"> <i class="fa fa-eye"></i> 
                </a>
                <a href="/manage/todo/'.$todo->id.'/edit" 
                    onclick="event.preventDefault();" 
                    data-original-title="edit" data-toggle="tooltip" 
                    data-placement="top" data-id="'.$todo->id.'" 
                    class="editLink btn menu-icon vd_bd-yellow vd_yellow btn-sm"> <i class="fa fa-pencil"></i> 
                </a>
                <a href="/manage/todo/'.$todo->id.'" onclick="event.preventDefault();" data-original-title="delete" data-toggle="tooltip" data-placement="top" data-id="'.$todo->id.'" class="deleteLink btn menu-icon vd_bd-red vd_red btn-sm"> <i class="fa fa-times"></i> 
                </a>  
            </td>';
            array_push($data, $todo);
        }
        $data2 = ['data'=>$data];

        return $data2;
       // return response()->json($user->todos);
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

            $data = [];
            $todo->action ='<td class="menu-action">
                <a href="/admin/users/'.$todo->id.'" data-original-title="view" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-green vd_green"> <i class="fa fa-eye"></i> 
                </a>
                <a href="/admin/users/'.$todo->id.'/edit" data-original-title="edit" data-toggle="tooltip" data-placement="top" data-id="'.$todo->id.'" class="editLink btn menu-icon vd_bd-yellow vd_yellow"> <i class="fa fa-pencil"></i> 
                </a>
                <a href="/admin/users/'.$todo->id.'" data-original-title="delete" data-toggle="tooltip" data-placement="top"  data-id="'.$todo->id.'" class="deleteLink btn menu-icon vd_bd-red vd_red"> <i class="fa fa-times"></i> 
                </a> 
            </td>';
            $data = ['data'=>$todo];

            return $data;

            //return response()->json($todo);
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
