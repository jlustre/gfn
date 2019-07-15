<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $subtitle ='TODO Summary.';
        return view('managers.todo', compact('pagetitle', 'subtitle'));
    }

}
