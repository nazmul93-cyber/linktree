<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('links');
        return view('users.show', [
            'user' => $user, 
        ]);
    }

    public function edit()
    {
        return view('users.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update()
    {
        request()->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#',
        ]);
        auth()->user()->update(request()->only(['background_color', 'text_color']));
        return redirect()->back()->with('success', 'changes saves successfully!');
    }
}
