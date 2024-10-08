<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class AuthController extends Controller
{
    public function pre_login()
    {
        return view('admin.login');
    }

    public function pre_register()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('/')->with('message', 'registration successful');
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
        
        return redirect('/')->with('message', 'login failed, please check your credentials');
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