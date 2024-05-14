<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


use App\Enums\PathOfUser;

class EstablishmentController extends Controller
{
    protected $paths;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // $this->userType = auth()->user()->type; // Assurez-vous que 'type' est la propriété correcte
            $method = auth()->user()->type; // Store the method name in a variable
            if ($method  == 'admin') {
                $this->paths = PathOfUser::admin->getPaths()['establishments']; // Use the variable as the method name

            } elseif ($method  == 'manager') {
                $this->paths = PathOfUser::manager->getPaths()['establishments']; // Use the variable as the method name

            }

            return $next($request);
        });
    }


    public function index()
    {


        $establishments = Establishment::all();
        return view($this->paths['index'], compact('establishments'));
    }





    public function create()
    {
        // $this->userType = auth()->user()->type;

        return view($this->paths['create']);
    }



    public function store(Request $request)
    {
        Establishment::create($request->all());
        return redirect()->route('establishments.index');
    }

    public function edit(Establishment $establishment)
    {
        // $this->userType = auth()->user()->type;

        return view($this->paths['edit'], compact('establishment'));
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
