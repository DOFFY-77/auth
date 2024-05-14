<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Enums\PathOfUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TypeController extends Controller
{
    protected $paths;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // $this->userType = auth()->user()->type; // Assurez-vous que 'type' est la propriété correcte
            $method = auth()->user()->type; // Store the method name in a variable
            if ($method  == 'admin') {
                $this->paths = PathOfUser::admin->getPaths()['types']; // Use the variable as the method name

            } elseif ($method  == 'manager') {
                $this->paths = PathOfUser::manager->getPaths()['types']; // Use the variable as the method name

            }

            return $next($request);
        });
    }



    public function index()
    {
        $types = Type::all();
        return view($this->paths['index'], compact('types'));
    }

    public function create()
    {
        return view($this->paths['create']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'typeparent_id' => 'nullable|exists:types,id'
        ]);

        Type::create($validatedData);
        return redirect()->route('types.index');
    }


    public function edit(Type $type)
    {
        return view($this->paths['edit'], compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'typeparent_id' => 'nullable|exists:types,id'
        ]);

        $type->update($validatedData);
        return redirect()->route('types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        DB::statement('ALTER TABLE types AUTO_INCREMENT = 1');
        return redirect()->route('types.index');
    }
}
