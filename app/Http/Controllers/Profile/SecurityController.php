<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSecurityUpdateRequest;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function show()
    {
        return view('profile.security');
    }

    public function update(ProfileSecurityUpdateRequest $request)
    {
        $attributes = $request->validated();

        if (Auth::user()->updatePassword($attributes['current_password'], $attributes['password'])) {
            return back()->with('success', 'Ваш пароль был успешно сменен.');
        }

        return back()->with('error', 'Текущий пароль введен неверно.');
    }
}
