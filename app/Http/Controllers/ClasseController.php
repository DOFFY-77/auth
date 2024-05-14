<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Device;
use App\Enums\PathOfUser;
use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\DB;


class ClasseController extends Controller
{
    protected $paths;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // $this->userType = auth()->user()->type; // Assurez-vous que 'type' est la propriété correcte
            $method = auth()->user()->type; // Store the method name in a variable
            if ($method  == 'admin') {
                $this->paths = PathOfUser::admin->getPaths()['classes']; // Use the variable as the method name

            } elseif ($method  == 'manager') {
                $this->paths = PathOfUser::manager->getPaths()['classes']; // Use the variable as the method name

            }

            return $next($request);
        });
    }



    
    public function index()
    {
        $classes = Classe::all();
        return view($this->paths['index'], compact('classes'));
    }


    public function create()
    {
        $establishments = Establishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view($this->paths['create'], compact('establishments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'establishment_id' => 'required|exists:establishments,id',
        ]);

        Classe::create($validatedData);
        return redirect()->route('classes.index');
    }

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        $establishments = Establishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view($this->paths['edit'], compact('classe', 'establishments'));
    }


    public function update(Request $request, $id)
    {
        $classe = Classe::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'establishment_id' => 'required|exists:establishments,id',
        ]);

        $classe->update($validatedData);
        return redirect()->route('classes.index');
    }

    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);

        $classe->delete();
        DB::statement('ALTER TABLE classes AUTO_INCREMENT = 1');

        return redirect()->route('classes.index');
    }
}
