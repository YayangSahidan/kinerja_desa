<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    public function loginView()
    {
        // Jika pengguna sudah login, arahkan ke halaman dashboard
        if(Auth::check()) {
            return redirect()->intended('dashboard');
        }

        return view('pages.auth.login');
    }
    public function authenticate(Request $request)
    {
      

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userStatus = Auth::user()->status;

            if($userStatus == 'submitted') {
                return back()->withErrors([
                    'email' => 'Akun Anda belum disetujui. Silakan tunggu konfirmasi dari admin.',
                ])->onlyInput('email');
            } else if ($userStatus == 'rejected') {
                return back()->withErrors([
                    'email' => 'Akun Anda telah ditolak admin.',
                ])->onlyInput('email');
            }
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Terjadi kesalahan, periksa kembali email atau password Anda.',
        ])->onlyInput('email');
    }
    public function registerView()
    {
         if(Auth::check()) {
            return back();
        }
        return view('pages.auth.register');
    }
    public function register(Request $request)
    {
        
         if(Auth::check()) {
            return back();
        }
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $user = new User();
        $user->name =$request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));// Hash the password 
        $user->role_id = 2; //=>user (penduduk)
        $user->saveOrFail();

        return redirect('/')->with('success', 'Registrasi berhasil, silakan tunggu konfirmasi dari admin.');
    }
    
    public function logout(Request $request)
    {
        
         if(!Auth::check()) {
            return redirect('/')->with('error', 'Anda belum login.');
        }

        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
