<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Review;

class RecipeController extends Controller
{
    // ✅ Halaman Beranda (Public)
    public function homepage(Request $request)
    {
        $query = Recipe::query();

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('description', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $recipes = $query->latest()->take(8)->get();
        $carouselRecipes = Recipe::latest()->take(3)->get();
        $categories = Category::all();

        return view('home', compact('recipes', 'carouselRecipes', 'categories'));
    }

    // ✅ Halaman Detail Resep
    public function show($id)
    {
        $recipe = Recipe::with('category', 'reviews')->findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    // ✅ Fitur Pencarian Resep
    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $recipes = Recipe::with('category')
            ->where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->latest()
            ->get();

        $categories = Category::all();

        return view('home', compact('recipes', 'categories', 'keyword'));
    }

    // ✅ Dashboard Admin
    public function adminIndex()
    {
        return view('admin.dashboard');
    }

    // ✅ List Resep (Admin)
    public function index()
    {
        $recipes = Recipe::with('category')->latest()->get();
        return view('admin.recipes.index', compact('recipes'));
    }

    // ✅ Form Tambah Resep
    public function create()
    {
        $categories = Category::all();
        return view('admin.recipes.create', compact('categories'));
    }

    // ✅ Simpan Resep
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:intan_categories,id',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('recipes', 'public') : null;

        Recipe::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'cooking_time' => $request->cooking_time,
            'image' => $path,
        ]);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    // ✅ Form Edit Resep
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        return view('admin.recipes.edit', compact('recipe', 'categories'));
    }

    // ✅ Update Resep
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:intan_categories,id',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'title',
            'category_id',
            'description',
            'ingredients',
            'instructions',
            'cooking_time'
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($data);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil diupdate.');
    }

    // ✅ Hapus Resep
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil dihapus.');
    }

    // ✅ Simpan Review
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'recipe_id' => $id,
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }
}
