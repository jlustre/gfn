<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use App\Profile;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle ='Users List';
        $subtitle ='Manage all users.';
        $users = User::all();
        
        return view('admin.users.index', compact('pagetitle', 'subtitle'))->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle ='Add New User';
        $subtitle ='Fill up the form to add new user.';
        $roles = Role::select('name','id')->orderBy('name','desc')->get();
        return view('admin.users.create', compact('roles', 'pagetitle', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'sponsor' => ['required', 'string', 'max:30', 'min:5', 'exists:users,username'],
            'username' => ['required', 'string', 'max:30', 'min:5', 'unique:users'],
            'firstname' => ['required', 'string', 'max:60'],
            'lastname' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'confirmed'],
        ]);

        $user = User::create([
            'sponsor' => $request->input('sponsor'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'is_active' => $request->input('is_active'),
            'password' => Hash::make($request->input('password')),
        ]);

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->firstname = $request->input('firstname');
        $profile->lastname = $request->input('lastname');
        
        if ($profile->save()) {
            return redirect('/admin/users')->with('msg_success', 'New User profile created successfully!');
        } else {
            session(['msg_errors' => 'New user profile creation failed!']);
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
        $user = User::find($id);
        $pagetitle = 'User Profile';
        $subtitle =$user->email;
        return view('admin.users.show', compact('pagetitle', 'subtitle'))->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::select('name','id')->orderBy('name','desc')->get();
        return view('admin.users.edit', compact('roles'))->with('user',$user);
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
        if (!empty($request->input('password'))) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ];
        } else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
            ];
        }

        $this->validate($request, $rules);

        //create new user
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_id = $request->input('role_id');
        $user->is_active = $request->input('is_active');
        
        if (!empty($request->input('password'))) {
            $user->password =  Hash::make($request->input('password'));
        }

        //Save user
        if ($user->save()) {
            return redirect('/admin/users')->with('msg_success', 'User updated successfully!');
        } else {
            return redirect('/admin/users')->with('msg_errors', 'User update Failed!');
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
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('msg_success', 'User deleted successfully!');
    }
}
