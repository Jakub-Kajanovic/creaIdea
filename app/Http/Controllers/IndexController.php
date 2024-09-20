<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function blog(Request $request)
{
    // Načítanie kategórií s počtom príspevkov
    $categories = Category::withCount('posts')->get();

    // Načítanie všetkých tagov
    $tags = Tag::all();

    // Vyhľadávanie a filtrovanie príspevkov
    $query = Post::query();

    // Vyhľadávanie podľa názvu
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->input('search') . '%');
    }

    // Filtrovanie podľa kategórie
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->input('category_id'));
    }

    // Filtrovanie podľa tagu
    if ($request->filled('tag_id')) {
        $query->whereHas('tags', function ($q) use ($request) {
            $q->where('tags.id', $request->input('tag_id'));
        });
    }

    // Načítanie príspevkov so stránkovaním (10 príspevkov na stranu)
    $posts = $query->with('category', 'tags')->paginate(10)->withQueryString();

    return view('pages.blog', compact('posts', 'categories', 'tags'));
}

    public function submit(){
        return view('pages.submit');
    }
}
