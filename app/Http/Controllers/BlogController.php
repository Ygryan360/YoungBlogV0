<?php

namespace App\Http\Controllers;

use App\Models\Folower;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Parsedown;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ConfirmSubscription;
use App\Models\Tag;

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

    public function category(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        return view('blog.category', [
            'category' => $category,
            'posts' => Post::where('category_id', $category->id)
                ->where('status', '=', 'published')
                ->latest()
                ->paginate(6),
            'moreCategories' => Category::take(9)->get(),
        ]);
    }

    public function tag(string $name)
    {
        $tag = Tag::where('name', $name)->firstOrFail();
        return view('blog.tag', ['posts' => $tag->posts(10), 'tag' => $tag]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:32',
        ]);
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->message,
        ]);
        return redirect()->route('blog.contact')->with('success', 'Votre message a bien été envoyé !');
    }

    public function newsletter(Request $request)
    {
        $request->validate(
            [
                'email' => ['email', 'required', 'unique:folowers'],
            ],
            [
                'email.unique' => 'Vous êtes déjà inscrit à la newsletter !',
                'email.required' => 'Veuillez entrer une adresse email valide !',
                'email.email' => 'Veuillez entrer une adresse email valide !',
            ]
        );
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
