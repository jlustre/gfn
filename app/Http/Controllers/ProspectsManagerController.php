<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProspectsManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle ='My Prospect List';
        $subtitle ='Manage Prospect List.';
        return view('managers.prospect', compact('pagetitle', 'subtitle'));
    }

}
