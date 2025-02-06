<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tags.index', ['tags' => Tag::all()]);
    }

    public function create()
    {
        return view('admin.tags.form', ['tag' => new Tag()]);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.form', ['tag' => $tag]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:tags', 'min:2', 'max:16'],
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag créé avec succès.');
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => ['required', 'unique:tags,name,' . $tag->id, 'min:2', 'max:16'],
        ]);

        $tag->update($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag mis à jour avec succès.');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->posts->count() > 0) {
            return back()->with('error', 'Suppression impossible! Ce tag est associé à des articles.');
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag supprimé avec succès.');
    }
}
