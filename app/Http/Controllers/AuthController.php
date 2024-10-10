<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;



class AuthController extends Controller
{
    function showRegister()
    {
        return view('register');
    }

    function showlogin()
    {
        return view('login');
    }

    function submitRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // ini masukin bagian name di route nya
        return redirect()->route('login');
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('threads.tampil');
        } else {
            return redirect()->back()->with('failed', 'Email or Password is wrong');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // //----------------------

    function showRegisterAdmin()
    {
        return view('registerAdmin');
    }

    function showLoginAdmin()
    {
        return view('loginAdmin');
    }

    // function submitRegisterAdmin(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $user = new Admin();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->is_admin = true;
    //     $user->save();
    //     Auth::guard('admin')->login($user);
    //     // ini masukin bagian name di route nya
    //     return redirect()->route('login.admin');
    // }

    function submitRegisterAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = true;
        $user->password = bcrypt($request->password);
        $user->save();
        // ini masukin bagian name di route nya
        return redirect()->route('login.admin');
    }

    function submitLoginAdmin(AdminLoginRequest $request)
    {


        if (auth()->guard('web')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])) {
            $user = auth()->guard('web')->user();
            // dd($user);
            if ($user->is_admin == true) {
                return redirect()->route('admin.dashboard')->with('success', 'You are Logged in sucessfully.');
            } else if ($user->is_admin == false) {
                return redirect()->route('threads.tampil')->with('success', 'You are Logged in sucessfully.');
            }
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }

    function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login.admin');
    }
}
