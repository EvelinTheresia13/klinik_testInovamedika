<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view ('login');
    }

    public function user_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential))
        {
            $user = Auth::user();
            if ($user->role  == 'pegawai')
            {
                return redirect()->intended('/pegawai/beranda');
            } elseif ($user->role  == 'dokter')
            {
                return redirect()->intended('/dokter/beranda');
            }
            return redirect()->intended('/');
        } 

        return redirect('login');
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');

    }
}
