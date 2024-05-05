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
    public function viewLogin()
    {
        if (Auth::check()) {

            return redirect()->route('admin.dashboard');
        }

        return view('login');
    }
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {

            return redirect()->back()->with("error", "Error logging in!");
        }

        return redirect()->route('admin.dashboard');
    }
    public function viewRegister(){
        if (Auth::check()) {

            return redirect()->route('admin.dashboard');
        }

        return view('register');
    }
    public function register(StoreUserRequest $request)
    {
        $user = User::create(
            $request->all()
        );

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
