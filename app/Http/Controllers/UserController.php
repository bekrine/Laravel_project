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
}
