<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new Category()]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories', 'min:2', 'max:32'],
            'description' => ['required', 'min:16', 'max:160'],
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categorie créée avec succès.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $category->id, 'min:2', 'max:32'],
            'description' => ['required', 'min:16', 'max:160'],
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        if ($category->posts->count() > 0) {
            return back()->with('error', 'Suppression impossible! Cette catégorie est associée à des articles.');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categorie supprimée avec succès.');
    }
}
