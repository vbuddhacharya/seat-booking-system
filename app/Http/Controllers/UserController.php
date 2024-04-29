<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if ( Auth::attempt($request->validated())){

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        else{

            return view('login');
        }
    }

    public function register(StoreUserRequest $request){
        
        $request = $request->validated();

        $user = User::create([
                'name'=> $request['name'], 
                'email' => $request['email'], 
                'password'=> Hash::make($request['password']), 
                'contact' => $request['contact']
            ]);

        return view('login');
    }
}
