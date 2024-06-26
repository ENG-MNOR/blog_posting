<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class authController extends Controller
{
    // register user 
//     public function register(Request $request){
//     // validate the registration data
//     $fields=$request->validate(['name'  => ['required','max:255'],
//       'email'=>['required','max:255','email','unique:users'],
//       'password'=>['required','min:3','confirmed'] 
//     ]);

//     //create user or register user
//      $user=User::create($fields);
     

//      //login the user 
//      Auth::login($user);

//     //  redirect to dashboard
//     return redirect()->route('dashboard');
// }
public function register(Request $request)
{
    // Validate the registration data
    $fields = $request->validate([
        'name' => ['required', 'max:255'],
        'email' => ['required', 'max:255', 'email', 'unique:users'],
        'password' => ['required', 'min:3', 'confirmed'],
    ]);

    // Hash the password before creating the user
    $fields['password'] = Hash::make($fields['password']);

    // Create the user
    $user = User::create($fields);

    // Log in the user
    Auth::login($user);

    // verify user 
    event(new Registered($user));
    // Redirect to dashboard
    return redirect()->route('dashboard');
}

public function login(Request $request){
    $fields=$request->validate([
        'email'=>['required','max:255','email'],
        'password'=>['required'],
    ]);
    // dd($request->remember);
    if(Auth::attempt($fields,$request->remember)){
        return redirect()->intended('home');
    }
    else{
        return back()->withErrors([
            'failed'=>"the provided credentials do not match our records."
        ]);
    }
}
public function logout(Request $request){
    //logout the current user   
    Auth::logout();

    //invalidate the user`s session
    $request->session()->invalidate();

    //Regenerate crf token
    $request->session()->regenerate();

    // redirect home
    return redirect('/');


}
}