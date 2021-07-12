<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallpapers()
    {
        return $this->hasMany(Wallpaper::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'login';
    }

    public function updatePassword($currentPassword, $newPassword)
    {
        if (Hash::check($currentPassword, $this->password)) {
            $this->password = Hash::make($newPassword);
            $this->save();

            return true;
        }

        return false;
    }

    public function hasMoreWallpapersThen($count=1)
    {
        $wallpapersCount = Wallpaper::where('user_id', $this->id)->count();

        return $wallpapersCount > 1;
    }

    public function getMoreWallpapers($count=1)
    {
        return Wallpaper::where('user_id', $this->id)->random($count)->get();
    }

    public function uploadAvatar($avatar)
    {
        if ($avatar) {
            $this->removeAvatar($this->avatar_path);

            $this->avatar_path = uploadImage($avatar, 'avatars');
            $this->save();
        }
    }

    public function removeAvatar($avatarPath)
    {
        if (Storage::exists($avatarPath)) {
            Storage::delete($avatarPath);
        }
    }

    public function getAvatar()
    {
        $link = $this->avatar_path ? "storage/{$this->avatar_path}" : 'img/default-image.png';

        return asset($link);
    }
}
