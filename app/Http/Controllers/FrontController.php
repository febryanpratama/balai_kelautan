<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    //

    public function indexRegister(){
        return view('register');
    }

    public function postRegister(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:3|max:255',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole('User');

        return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
    }
}
