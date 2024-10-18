<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        dd('Store user ' . $user->id);
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
