<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TodosManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle ='My Todo List';
        $subtitle ='Manage TODO List.';
        return view('managers.todo', compact('pagetitle', 'subtitle'));
    }

}
