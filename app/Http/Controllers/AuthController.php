<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class AuthController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    
    public function doLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => '',
            'username' => '',
            'password' => 'bail|required|string|min:1',
        ]);

        if($request->email != null) {
            $loginData['email'] = $request->email;
            $loginData['password'] = $request->password;
        } else {
            $loginData['username'] = $request->username;
            $loginData['password'] = $request->password;
        }

        if (Auth::attempt($loginData)) {
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

    public function preRegister() {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'username'     => 'required|string|max:255|unique:users,username',
            'email'        => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password'     => 'required|string|min:8',
        ]);

        $mapper = [
            "student" => "App\Models\Student",
            "teacher" => "App\Models\Teacher",
        ];

        $user = User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'password'      => bcrypt($request->password),
        ]);

        $profile = $mapper[$request->typeable]::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'student_id' => $request->typeable === 'student' ? 'STD-' . fake()->unique()->numerify('#####') : 'TCH-' . fake()->unique()->numerify('#####'),
        ]);

        $user->typable()->associate($profile);
        $user->save();

        Auth::login($user);
        return redirect('/')->with('success', 'Registration successful!');
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