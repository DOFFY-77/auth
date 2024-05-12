<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('accounts.manager.users.index', compact('users'));
    }

    public function create()
    {
        return view('accounts.manager.users.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'pin' => 'required',
            'type' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');

        // User::create($request->all());
        // return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('accounts.manager.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('accounts.manager.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        return redirect()->route('users.index');
    }
}

