<?php

namespace App\Http\Controllers;

use Auth;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.login');
    }

    /**
     * Store the session for logged in user
     */
    public function store()
    {
        $authRequest = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if (!Auth::attempt($authRequest)) {
            return back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.'
            ])->withInput(['email' => request('email')]);
        }
        request()->session()->regenerate();

        return redirect()->route('dashboard');
    }

    /**
     * Destroy the session for logged in user
     */
    public function destroy()
    {
        Auth::logout();

        $currentRoute = url()->previous();
        return redirect($currentRoute);
    }
}
