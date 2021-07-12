<?php

namespace App\Policies;

use App\User;
use App\Wallpaper;
use Illuminate\Auth\Access\HandlesAuthorization;

class WallpaperPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Wallpaper $wallpaper)
    {
        return $user->is($wallpaper->author);
    }
}
