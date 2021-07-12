<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Wallpaper extends Model
{
    protected $fillable = [
        'category_id', 'title', 'description'
    ];

    public function scopeRandom($query, $count=1)
    {
        return $query->orderBy(DB::raw('RAND()'))->take($count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImage()
    {
        $link = $this->wallpaper_path ? "storage/{$this->wallpaper_path}" : 'img/default-image.png';

        return asset($link);
    }

    public function hasImage()
    {
        return $this->wallpaper_path ?: false;
    }

    public function hasCategory()
    {
        return $this->category ?: false;
    }

    public function getCategoryName()
    {
        return $this->category->name ?? 'Нет категории';
    }

    public function getResolutionAttribute($value)
    {
        return $value ?: 'Нет разрешения';
    }

    public function getUploadDate()
    {
        return Carbon::parse($this->created_at)->isoFormat('DD.MM.YYYY');
    }

    public static function upload($attributes)
    {
        $wallpaper = new self;
        $wallpaper->fill($attributes);
        $wallpaper->user_id = Auth::id();
        $wallpaper->wallpaper_path = uploadImage($attributes['wallpaper'], 'wallpapers');
        $wallpaper->resolution = getImageResolution($attributes['wallpaper']);

        $wallpaper->save();
    }

    public function removeWallpaper($wallpaperPath)
    {
        if (Storage::exists($wallpaperPath)) {
            Storage::delete($wallpaperPath);
        }
    }

    public function updateWallpaper($attributes)
    {
        $this->fill($attributes);
        $this->user_id = Auth::id();
        $this->removeWallpaper($this->wallpaper_path);

        if (isset($attributes['wallpaper'])) {
            $this->wallpaper_path = uploadImage($attributes['wallpaper'], 'wallpapers');
            $this->resolution = getImageResolution($attributes['wallpaper']);
        }

        $this->save();
    }
}
