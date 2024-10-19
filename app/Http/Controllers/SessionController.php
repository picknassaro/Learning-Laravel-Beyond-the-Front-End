<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Validation\ValidationException;

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
            throw ValidationException::withMessages(['email' => 'Invalid email', 'password' => 'Invalid password']);
        }
        request()->session()->regenerate();
        return redirect()->route('showAllJobs');
    }

    /**
     * Destroy the session for logged in user
     */
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
