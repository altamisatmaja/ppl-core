<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(LoginRequest $request) {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         if (Auth::user()->user_role === 'Admin') {
    //             return redirect()->route('admin.dashboard')->with('status', 'Anda berhasil login');
    //         } else {
    //             Auth::logout();
    //             return redirect()->back()->with('status', 'Anda bukan admin!');
    //         }
    //     }

    //     return redirect()->route('admin.login')->with('status', 'Email atau password salah.');
    // }

    public function store(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
    
        $redirectTo = '';
    
        if(Auth::check()) {
            switch (Auth::user()->user_role) {
                case 'Admin':
                    $redirectTo = 'admin.dashboard';
                    break;
            }
        } else {
            $loginRoute = '';
            switch ($request->input('user_role')) {
                case 'Admin':
                    $loginRoute = 'admin.login';
                    break;
            }
            return redirect()->route($loginRoute)->with('status', 'Invalid credentials.');
        }
    
        return redirect()->route($redirectTo);
    }
    
     /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
