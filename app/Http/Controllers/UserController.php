<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function signup(User $user)
    {
        return view('pages.user.signup');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(User $user)
    {
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $user::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(User $user)
    {
        return view('pages.user.login');
    }

    /**
     * Store the session for logged in user
     */
    public function session(User $user)
    {
        dd('Session user ' . $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        dd('Show user ' . $user->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        dd('Edit user ' . $user->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        dd('Update user ' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd('Destroy user ' . $user->id);
    }
}
