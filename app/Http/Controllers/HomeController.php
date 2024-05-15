<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('accounts.user.home', compact('user'));
    }

    public function adminHome()
    {
        $user = Auth::user();
        return view('accounts.admin.home', compact('user'));
    }
    public function managerHome()
    {
        $user = Auth::user();
        return view('accounts.manager.home', compact('user'));
    }
}
