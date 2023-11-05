<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }
    
    public function login(Request $request) {
        $validate = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $validate['email'], 'password' => $validate['password']])) {
            $request->session()->regenerate();
            $user = User::where('email', $validate['email'])->first();
            if ($user->kelas == 'admin') {
                return redirect('/admin/dashboard');
            }
            return redirect('/dashboard');
        }
        return back()->with('message', 'Login failed!',);
    }

    public function register() {
        return view('register');
    }

    public function storeRegister(Request $request) {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = new User();
        $user->nama = $validate['nama'];
        $user->kelas = $validate['kelas'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();

        return redirect('/')->with('success', 'User Berhasil di Buat');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
