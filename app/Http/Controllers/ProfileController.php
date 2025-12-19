<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'birthday' => 'nullable|date',
            'about' => 'nullable|max:500',
            'avatar' => 'nullable|image',
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            $user->avatar_path = $request->file('avatar')
                ->store('avatars', 'public');
        }

        $user->update($request->only('username', 'birthday', 'about'));

        return redirect()->route('profile.show', $user);
    }
}
