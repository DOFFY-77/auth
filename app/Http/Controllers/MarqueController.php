<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Enums\PathOfUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MarqueController extends Controller
{
    protected $paths;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // $this->userType = auth()->user()->type; // Assurez-vous que 'type' est la propriété correcte
            $method = auth()->user()->type; // Store the method name in a variable
            if ($method  == 'admin') {
                $this->paths = PathOfUser::admin->getPaths()['marques']; // Use the variable as the method name

            } elseif ($method  == 'manager') {
                $this->paths = PathOfUser::manager->getPaths()['marques']; // Use the variable as the method name

            }

            return $next($request);
        });
    }

    
    public function index()
    {
        $marques = Marque::all();
        return view($this->paths['index'], compact('marques'));
    }

    public function create()
    {
        return view($this->paths['create']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Marque::create($validatedData);
        return redirect()->route('marques.index');
    }


    public function edit($id)
    {
        $marque = Marque::findOrFail($id);
        return view($this->paths['edit'], compact('marque'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
    
        $marque = Marque::findOrFail($id);
        $marque->update($validatedData);
    
        return redirect()->route('marques.index')->with('success', 'Marque updated successfully');
    }
    
    public function destroy($id)
    {
        $marque = Marque::findOrFail($id);
        $marque->delete();
        DB::statement('ALTER TABLE marques AUTO_INCREMENT = 1');

    
        return redirect()->route('marques.index')->with('success', 'Marque deleted successfully');
    }
    }