<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

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
    public function showTags()
    {
        return view('blog.tags', [
            'tags' => Tag::paginate($this->perPages)
        ]);
    }
    public function searchPosts(Request $request)
    {
        if (!$request->has('keyword')) {
            return redirect()->route('blog.home');
        }

        return view('blog.search_posts', [
            'posts' => Post::publish()->search($request->keyword)
                ->paginate($this->perPages)
                ->appends(['keyword' => $request->keyword])
        ]);
    }
}
