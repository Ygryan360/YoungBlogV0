<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all(),
        ]);
    }

    public function create()
    {
        return view('admin.posts.form', ['post' => new Post()]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = \Str::slug($data['title']);
        $post = Post::create($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Article créé avec succès');
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['slug'] = \Str::slug($data['title']);
        $post->update($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Article modifié avec succès');
    }

    public function changeStatus(Post $post, Request $request)
    {
        $request->validate(['status' => ['required', 'in:published,draft']]);
        $post->update(['status' => $request->status]);
        return redirect()->route('posts.index')->with('success', 'Statut modifié avec succès');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès');
    }
}
