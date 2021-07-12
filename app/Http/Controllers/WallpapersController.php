<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\WallpaperUploadRequest;
use App\Http\Requests\WallpaperUpdateRequest;
use App\User;
use App\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallpapersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['author', 'category', 'show']);
    }

    public function author(User $user)
    {
        return view('wallpapers.author', [
            'wallpapers' => $user->wallpapers()->paginate(16),
            'author' => $user
        ]);
    }

    public function category(Category $category)
    {
        return view('wallpapers.category', [
            'wallpapers' => $category->wallpapers()->paginate(16),
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('wallpapers.create', [
            'categories' => Category::latest()->get()
        ]);
    }

    public function store(WallpaperUploadRequest $request)
    {
        Wallpaper::upload($request->validated());

        return back()->with('success', 'Спасибо. Ваши обои были успешно загружены.');
    }

    public function show(Wallpaper $wallpaper)
    {
        return view('wallpapers.show', [
            'wallpaper' => $wallpaper
        ]);
    }

    public function edit(Wallpaper $wallpaper)
    {
        $this->authorize('update', $wallpaper);

        $currentCategory = $wallpaper->hasCategory() ?? null;

        return view('wallpapers.edit', [
            'wallpaper' => $wallpaper,
            'categories' => Category::latest()->get()->except($currentCategory->id ?? null),
            'currentCategory' => $currentCategory
        ]);
    }

    public function update(WallpaperUpdateRequest $request, Wallpaper $wallpaper)
    {
        $this->authorize('update', $wallpaper);

        $wallpaper->updateWallpaper($request->validated());

        return back()->with('success', 'Отлично. Ваши обои были успешно обновлены.');
    }

    public function destroy(Wallpaper $wallpaper)
    {
        $this->authorize('update', $wallpaper);

        $wallpaper->removeWallpaper($wallpaper->wallpaper_path);
        $wallpaper->delete();

        return back();
    }
}
