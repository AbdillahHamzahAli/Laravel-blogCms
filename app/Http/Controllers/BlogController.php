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
    public function showPostsByCategory($slug)
    {
        $posts = Post::publish()->whereHas('categories', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perPages);

        $category = Category::where('slug', $slug)->first();
        $categoryRoot = $category->root();

        return view('blog.posts-category', [
            'posts' => $posts,
            'category' => $category,
            'categoryRoot' => $categoryRoot
        ]);
    }
    public function showPostsByTag($slug)
    {
        $posts = Post::publish()->whereHas('tag', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perPages);

        $tag = Tag::where('slug', $slug)->first();
        $tags = Tag::search($tag->title)->get();

        return view('blog.posts-tag', [
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }
    public function showPostDetail($slug)
    {
        $post = Post::with(['categories', 'tag'])->where('slug', $slug)->first();
        if (!$post) {
            return redirect()->route('blog.home');
        }
        // dd($post);
        return view('blog.post-detail', [
            'post' => $post
        ]);
    }
}
