<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{
    protected $pathOfadmin = 'accounts.admin.establishments.index';
    protected $pathOfmanager = 'accounts.manager.establishments.index';



    public function index()
    {

            $userType = auth()->user()->type;
            $establishments = Establishment::all();
    
            if ($userType == 'admin') {
                return view('accounts.admin.establishments.index', compact('establishments'));
            } elseif ($userType == 'manager') {
                return view('accounts.manager.establishments.index', compact('establishments'));
            }
    
            return redirect('/');
        }
    




    public function create()
    {
        $userType = auth()->user()->type;

        if ($userType == 'admin') {
            return view('accounts.admin.establishments.create');
        } elseif ($userType == 'manager') {
            return view('accounts.manager.establishments.create');
        }

        return redirect('/');
    }



    public function store(Request $request)
    {
        Establishment::create($request->all());
        return redirect()->route('establishments.index');
    }

    public function edit(Establishment $establishment)
    {
        $userType = auth()->user()->type;

    if ($userType == 1) {
        return view('accounts.admin.establishments.edit', compact('establishment'));
    } elseif ($userType == 2) {
        return view('accounts.manager.establishments.edit', compact('establishment'));
    }

    return redirect('/');
    }

    public function update(Request $request, Establishment $establishment)
    {
        $establishment->update($request->all());
        return redirect()->route('establishments.index');
    }

    public function destroy(Establishment $establishment)
    {

        $establishment->classes()->delete();
        $establishment->delete();
        DB::statement('ALTER TABLE establishments AUTO_INCREMENT = 1');
        return redirect()->route('establishments.index');
    }
}
