<?php

namespace App\Http\Controllers;

use App\Wallpaper;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function home()
    {
        return view('wallpapers.index', [
            'wallpapers' => Wallpaper::latest()->paginate(16),
            'wallpapersCount' => \DB::table('wallpapers')->get('id')->count()
        ]);
    }

    public function rules()
    {
        // TODO: create rules page.
    }
}
