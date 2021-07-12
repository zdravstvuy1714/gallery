<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function scopeRandom($query, $count=1)
	{
	    return $query->orderBy(DB::raw('RAND()'))->take($count);
	}

    public function wallpapers()
    {
        return $this->hasMany(Wallpaper::class)->latest();
	}

    public function getRouteKeyName()
    {
        return 'slug';
	}

    public function getCover()
    {
        $link = $this->cover_path ? "storage/{$this->cover_path}" : 'img/default-image.png';

        return asset($link);
    }
}
