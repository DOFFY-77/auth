<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('accounts.user.home');
    }

    public function adminHome()
    {
        return view('accounts.admin.establishements.index');
    }
    public function managerHome()
    {
        return view('accounts.manager.establishements.index');
    }
}
