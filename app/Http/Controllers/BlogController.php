<?php

namespace App\Http\Controllers;

use Parsedown;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        return view('blog.home', [
            'posts' => Post::select(['title', 'content', 'slug', 'cover', 'created_at', 'id', 'category_id'])
                ->where('created_at', '>=', now()->subWeeks(2))
                ->where('status', '=', 'published')
                ->orderBy('views', 'desc')
                ->take(8)
                ->get()
        ]);
    }

    public function posts()
    {
        return view('blog.posts', [
            'posts' => Post::select(['title', 'content', 'slug', 'cover', 'created_at', 'id', 'category_id'])
                ->where('status', '=', 'published')->latest()->paginate(5),
        ]);
    }

    public function show(string $slug, Post $post)
    {
        $post->update(['views' => $post->views + 1]);
        $parsedown = new Parsedown();
        $parsedown->setMarkupEscaped(true);
        $post->content = $parsedown->text($post->content);
        return view('blog.show', compact('post'));
    }

    public function category($name)
    {
        return view('blog.category');
    }

    public function tag($name)
    {
        return view('blog.tag');
    }

    public function search(Request $request)
    {
        if ($request->input('search') === null || $request->input('search') === '') {
            return view('blog.search');
        }
        return view('blog.search', [
            'results' => Post::where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%")
                ->where('status', '=', 'published')
                ->paginate(6)
                ->appends($request->only('search'))
        ]);
    }

    public function about()
    {
        return view('blog.about');
    }

    public function contact()
    {
        return view('blog.contact');
    }


}
