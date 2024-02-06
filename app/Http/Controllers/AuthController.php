<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard\create;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi'
            ],
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == "admin") {
                return redirect()->route('admin.index');
            } else if (Auth::user()->role == "customer") {
                return redirect()->route('customer.index');
            } else if (Auth::user()->role == "bank") {
                return redirect()->route('bank.index');
            } else if (Auth::user()->role == "kantin") {
                return redirect()->route('kantin.index');
            }
        } else {
            return redirect(route('login'))->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }

    public function create()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $str=Str::random(10);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'fullname.required' => 'nama wajib diisi',
                'email.required' => 'email wajib diisi',
                'password,required' => 'password wajib diisi',
            ]
        );
        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $str,
            'email_verified_at' => now(),
            'role' => 'customer',
        ];
        User::create($inforegister);

       return view('customer.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
