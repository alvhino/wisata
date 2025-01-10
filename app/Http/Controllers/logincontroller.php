<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\wisata;
use App\Models\petugas;
use Auth;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function index()
    {
        return view('login.index');
    }

    public function login_proses(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('wisata');
        }

        // Redirect back with an error if authentication fails
        return back()->with('error', 'Username atau password Anda salah');

    }


    public function logout(Request $request)
    {
        // Logout user
        Auth::guard('web')->logout(); // Logout pengguna
        $request->session()->invalidate(); // Invalidasi session
        $request->session()->regenerateToken(); // Regenerasi token CSRF
    
        return redirect('/'); 
    }
    
}
