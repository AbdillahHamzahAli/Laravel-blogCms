<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    private $perPages = 10;
    public function home()
    {
        return view('blog.home', [
            'posts' => Post::publish()->latest()->paginate($this->perPages)
        ]);
    }
    public function showCategories()
    {
        return view('blog.categories', [
            'categories' => Category::onlyParent()->paginate($this->perPages)
        ]);
    }
}
