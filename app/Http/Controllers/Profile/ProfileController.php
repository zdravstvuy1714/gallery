<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile.profile', [
            'user' => $user
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $attributes = $request->validated();

        $user = Auth::user();

        $user->uploadAvatar($attributes['avatar'] ?? null);
        $user->update($attributes);

        return back()->with('success', 'Ваша информация о профиле была успешно обновлена.');
    }
}
