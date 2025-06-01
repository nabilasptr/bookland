<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function showRegister (){
        return view ('auth.register');
    }

    public function register (Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name'=> $validated['name'],
            'email'=>$validated['email'],
            'password'=>hash::make($validated['password']),
            'role'=>'user',

        ]);

        return redirect()->route('login')->with('success','berhasil registrasi');
    }

    public function showLogin (){
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role==='admin'){
                return redirect()->route('books.index')->with('success','berhasil login');
            }
            return redirect()->route('page.home')->with('success','berhasil login');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
{
    Auth::logout(); // keluar dari sesi auth

    $request->session()->invalidate(); // hapus semua sesi
    $request->session()->regenerateToken(); // buat ulang CSRF token

    return redirect()->route('login'); // redirect ke halaman login
}
}
