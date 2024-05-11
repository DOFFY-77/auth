<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('accounts.manager.marques.index', compact('marques'));
    }

    public function create()
    {
        return view('accounts.manager.marques.create');
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
        return view('accounts.manager.marques.edit', compact('marque'));
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