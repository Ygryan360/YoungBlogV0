<?php

namespace App\Http\Controllers;

use App\Mail\NewMessage;
use App\Models\Comment;
use Parsedown;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Folower;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ConfirmSubscription;
use Illuminate\Support\Facades\Mail;

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
        if ($post->status !== 'published') {
            abort(404);
        }
        $post->update(['views' => $post->views + 1]);
        $parsedown = new Parsedown();
        $parsedown->setMarkupEscaped(true);
        $post->content = $parsedown->text($post->content);
        return view('blog.show', compact('post'));
    }

    public function comment(Post $post, Request $request)
    {
        $request->validate([
            'content' => ['required', 'string', 'min:2', 'max:1000'],
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'min:2'],
        ]);

        Comment::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('comment-success');
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('blog.category', [
            'category' => $category,
            'posts' => Post::where('category_id', $category->id)
                ->where('status', '=', 'published')
                ->latest()
                ->paginate(6),
            'moreCategories' => Category::take(9)->get(),
        ]);
    }

    public function tag(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        return view('blog.tag', ['posts' => $tag->posts()->paginate(50), 'tag' => $tag]);
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
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:32'],
        ]);
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->message,
        ]);
        Mail::to('rayanetchabodi360@gmail.com')->send(new NewMessage($message));

        return redirect()->route('blog.contact')->with('success', 'Votre message a bien été envoyé !');
    }

    public function newsletter(Request $request)
    {
        $request->validate(['email' => ['email', 'required', 'unique:folowers']]);
        $folower = Folower::create(['email' => $request->email]);
        Mail::to($folower->email)->send(new ConfirmSubscription($folower));

        return redirect()->back()->with('success', 'Un email de confirmation vous a été envoyé ! Veuillez vérifier votre boîte de réception.');
    }

    public function confirm(Request $request)
    {
        $folower = Folower::where('email', $request->email)->where('id', $request->id)->firstOrFail();
        $folower->verified = true;
        $folower->save();

        return redirect()->route('blog.home')->with('success', 'Votre abonnement a été confirmé !');
    }

    public function unsubscribe(Request $request)
    {
        $folower = Folower::where('email', $request->email)->where('id', $request->id)->firstOrFail();
        $folower->delete();

        return redirect()->route('blog.home')->with('success', 'Votre abonement à notre newletter a été annulée !');
    }

    public function privacy()
    {
        return view('blog.privacy');
    }

}
