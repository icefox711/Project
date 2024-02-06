<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $str = Str::random(10);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'nama wajib diisi',
                'email.required' => 'email wajib diisi',
                'password,required' => 'password wajib diisi',
            ]
        );

        $emailverif = now();
        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $str,
            'role' => 'customer',
        ];

        $userRegis = User::create($inforegister);

        $rekening = '64' . auth()->id() . now()->format('YmdHis');
        $wallet = [
            'rekening' => $rekening,
            'id_user' => $userRegis->id,
            'saldo' => 0,
            'status' => "aktif",
        ];

        Wallet::create($wallet);

        return redirect()->route('login')->with('success', 'Berhasil register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
