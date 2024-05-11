<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Establishment;
use App\Models\Device;
use Illuminate\Support\Facades\DB;


class ClasseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        return view('accounts.manager.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $establishments = Establishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view('accounts.manager.classes.create', compact('establishments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'establishment_id' => 'required|exists:establishments,id',
        ]);

        Classe::create($validatedData);
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Display the specified resource.
     */




    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        $establishments = Establishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view('accounts.manager.classes.edit', compact('classe', 'establishments'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Classe $classe) // تأكد من استخدام النوع الصحيح للمتغير
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'establishment_id' => 'required|exists:establishments,id',
    //     ]);

    //     $classe->update($validatedData); // استخدم النموذج الصحيح هنا
    //     return redirect()->route('classes.index');
    // }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        // حذف أو تحديث الأجهزة المرتبطة
        Device::where('class_id', $classe->id)->delete(); // أو تحديثها بقيمة أخرى

        // بعد ذلك، يمكنك حذف الفصل
        $classe->delete();
        DB::statement('ALTER TABLE classes AUTO_INCREMENT = 1');

        return redirect()->route('classes.index');
    }

}
