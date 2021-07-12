<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->paginate(16)
        ]);
    }
}
