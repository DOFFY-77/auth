<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'phone' => ['required', 'string', 'max:255'],
    //         'pin' => ['required', 'string', 'max:6', 'unique:users'],

    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\User
    //  */
    // protected function update(Request $request)
    // {
    //     $user = User::where('pin', $request->pin)->first();
    //     if (!$user) {
    //         return redirect('register')->with('error', 'The PIN code does not exist.');
    //     }
    //     else {
    //         $user->update([
    //             'name' => $request->name,
    //             'phone' => $request->phone,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //         ]);
    //         return redirect('login')->with('success', 'You have successfully registered.');
            
    //     }}
    protected function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'phone' => ['required', 'string', 'max:255'],
        'pin' => ['required', 'string', 'max:6'],
    ]);

    if ($validator->fails()) {
        return redirect('register')->withErrors($validator)->withInput();
    }

    $user = User::where('pin', $request->pin)->first();
    $pin = mt_rand(100000, 999999);

    if (!$user) {
        return redirect('register')->with('error', 'The PIN code does not exist.');
    } else {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

            $user->update(['pin' => $pin]);
            event(new Registered($user));
            Auth::login($user);
        return redirect('login')->with('success', 'You have successfully registered.');
    }
}

        
        
        

}