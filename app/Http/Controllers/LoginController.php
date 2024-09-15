<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class LoginController extends Controller
{
    public function pre_login()
    {
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $check_if_admin = Auth::user()->hasRole('admin');

            // If the user is an admin, redirect to the admin dashboard
            if ($check_if_admin) {
                backpack_auth()->login(Auth::user());
                return redirect('/admin/dashboard')->with('message', 'login successful');
            }
            
            // If the user is not an admin, redirect to the home dashboard
            return redirect('/')->with('message', 'login successful');
        }
        
        return redirect('/')->with('message', 'login failed');
    }

    public function logout(Request $request)
    {

        if (backpack_auth()->check()) {
            backpack_auth()->logout();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'logout successful');
    }
}