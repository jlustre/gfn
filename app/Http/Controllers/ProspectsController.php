<?php

namespace App\Http\Controllers;
use App\Prospect;
use App\User;

use Illuminate\Http\Request;
use Validator;

class ProspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "I am here at __LINE__ at file __FILE__"; exit;
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $data = [];
        $data2 = [];
        foreach($user->prospects as $prospect) {
            //$prospect->action ='<td class="menu-action">TODO</td>';
            array_push($data, $prospect);
        }
        $data2 = ['data'=>$data];

        return $data2;
       // return response()->json($user->prospects);
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
            'firstname' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response; exit;
        } else {
            //create a prospect
            $prospect = new Prospect;
            $prospect->user_id = auth()->user()->id;
            $prospect->firstname = $request->input('firstname');
            $prospect->lastname = $request->input('lastname');
            $prospect->spousename = $request->input('spousename');
            $prospect->is_married = $request->input('is_married');
            $prospect->nbr_kids = $request->input('nbr_kids');
            $prospect->source = $request->input('source');
            $prospect->phone = $request->input('phone');
            $prospect->alt_phone = $request->input('alt_phone');
            $prospect->call_best_time = $request->input('call_best_time');
            $prospect->email = $request->input('email');
            $prospect->hot_buttons = $request->input('hot_buttons');
            $prospect->company = $request->input('company');
            $prospect->profession = $request->input('profession');
            $prospect->common_ground = $request->input('common_ground');
            $prospect->interests = $request->input('interests');
            $prospect->birthday = $request->input('birthday');
            $prospect->city = $request->input('city');
            $prospect->state_id = $request->input('state_id');
            $prospect->country_id = $request->input('country_id');
            $prospect->timezone_id = $request->input('timezone_id');
            $prospect->other_info = $request->input('other_info');
            //$prospect->created_at = now();
            //$prospect->updated_at = now();
            $prospect->save();

            $data = [];
            $data = ['data'=>$prospect];

            return $data;
            //return response()->json($prospect);
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
        $prospect = Prospect::find($id);
        return response()->json($prospect);
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
            'firstname' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            //update a prospect
            $prospect = Prospect::find($id);
            $prospect->firstname = $request->input('firstname');
            $prospect->lastname = $request->input('lastname');
            $prospect->spousename = $request->input('spousename');
            $prospect->is_married = $request->input('is_married');
            $prospect->nbr_kids = $request->input('nbr_kids');
            $prospect->source = $request->input('source');
            $prospect->phone = $request->input('phone');
            $prospect->alt_phone = $request->input('alt_phone');
            $prospect->call_best_time = $request->input('call_best_time');
            $prospect->email = $request->input('email');
            $prospect->hot_buttons = $request->input('hot_buttons');
            $prospect->company = $request->input('company');
            $prospect->profession = $request->input('profession');
            $prospect->common_ground = $request->input('common_ground');
            $prospect->interests = $request->input('interests');
            $prospect->birthday = $request->input('birthday');
            $prospect->city = $request->input('city');
            $prospect->state_id = $request->input('state_id');
            $prospect->country_id = $request->input('country_id');
            $prospect->timezone_id = $request->input('timezone_id');
            $prospect->other_info = $request->input('other_info');
            $prospect->save();
            return response()->json($prospect);
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
        $prospect = Prospect::find($id);
        $prospect->delete();
        $response = array('response' => 'Prospect deleted ...', 'success' => true);
        return $response;
    }
}
