<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View|RedirectResponse
    {
        // ketika session user ada, redirect ke tpmoduls.index
        if (session()->has('user')) {
            // RedirectResponse
            return redirect()->route('tpmoduls.index');
        }


        // View
        if (request()->routeIs('register')) {
            return view('auth.register');
        }
        return view('auth.login');
    }

    /**
     * Store a newly created user (register) in storage.
     */
    public function register(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // session
        $request->session()->put('user', $user);
        $request->session()->regenerate();

        return redirect()->route('tpmoduls.index')->with('message', 'Registration successful!');
    }

    /**
     * Login.
     */
    public function login(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        // Find user by email
        $user = User::where('email', $credentials['email'])->first();
        
        // Check if user exists and password is correct
        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('user', $user);
            $request->session()->regenerate();

            return redirect()->route('tpmoduls.index')
                            ->with('message', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) : RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logout successful!');
    }
}
