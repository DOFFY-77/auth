<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Establishment;
use App\Models\Classe;
use App\Models\Marque;
use App\Models\Type;

class DeviceController extends Controller
{
    // Display a listing of the devices.
    public function index()
    {
        $devices = Device::all();
        return view('accounts.manager.devices.index', compact('devices'));
    }

    // Show the form for creating a new device.
    public function create()
    {
        $establishments = Establishment::all();
        $classes = Classe::get();
        $marques = Marque::all();
        $types = Type::all();

        return view('accounts.manager.devices.create', compact('establishments', 'classes', 'marques', 'types'));
    }

    // Store a newly created device in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'info_device' => 'required|string|max:255',
            'reference' => 'nullable|string',
            'status' => 'required|string',
            'establishment_id' => 'required|integer|exists:establishments,id',
            'class_id' => 'required|integer|exists:classes,id',
            'marque_id' => 'required|integer|exists:marques,id',
            'type_id' => 'required|integer|exists:types,id',
        ]);

        Device::create($validatedData);
        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    // Display the specified device.


    // Show the form for editing the specified device.
    public function edit(Device $device)
    {
        $establishments = Establishment::all(); // تأكد من أن هذا السطر موجود
        $classes = Classe::all();
        $marques = Marque::all();
        $types = Type::all();

        return view('accounts.manager.devices.edit', compact('device', 'establishments', 'classes', 'marques', 'types'));
    }


    // Update the specified device in storage.
    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate([
            'info_device' => 'required|string|max:255',
            'reference' => 'nullable|string',
            'status' => 'required|string',
            'establishment_id' => 'required|integer|exists:establishments,id',
            'class_id' => 'required|integer|exists:classes,id',
            'marque_id' => 'required|integer|exists:marques,id',
            'type_id' => 'required|integer|exists:types,id',
        ]);

        $device->update($validatedData);
        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    // Remove the specified device from storage.
    public function destroy(Device $device)
    {
        $device->delete();
        DB::statement('ALTER TABLE devices AUTO_INCREMENT = 1');
        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
    public function getClasses($establishmentId)
    {
        $classes = Classe::where('establishment_id', $establishmentId)->get();
        $classesArray = [];
        foreach ($classes as $class) {
            $classesArray[$class->id] = $class->name;
        }
        return response()->json($classesArray);
    }
}
