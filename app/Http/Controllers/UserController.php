<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function create(){
    return view('users.register');
   }

   public function store(Request $request){
            $formFeilds=$request->validate([
                'name'=>['required','min:3'],
                'email'=>['required','email',Rule::unique('users','email'),],
                'password'=>'required|confirmed|min:6',
            
            ]);

            $formFeilds['password'] = bcrypt($formFeilds['password']);
           $user=User::create($formFeilds);
            auth()->login($user);

            return redirect('/')->with('message','User created and logged in');
   }

   public function logout(Request $request){
    $request->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    redirect('/')->with('message','You have been Logged Out!');
   }

   public function show(){
    return view('users.login');
   }

   public function authenticate(Request $request)
   {
    $formFeilds=$request->validate([
        'email'=>['required','email'],
        'password'=>'required',
    ]);

    if(auth()->attempt($formFeilds)){
        $request->session()->regenerate();
        return redirect('/')->with('message','You are now Logged');
    }
  

        return back()->withErrors(['email'=>'Invalid Creentials'])->onlyInput('email');
   }
}
