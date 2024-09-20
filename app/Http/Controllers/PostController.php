<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required',
        'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
    ]);

    // Ukladanie obrázku, ak bol nahratý
    $imagePath = null;
    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Vytvorenie príspevku s fixným author_id
    $post = Post::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'category_id' => $request->input('category_id'),
        'author_id' => auth()->id(), // Fixne nastavený autor s ID 1
        'image' => $imagePath,
    ]);

    // Priradenie tagov k príspevku
    if ($request->has('tags')) {
        $post->tags()->sync($request->input('tags')); // Priradenie tagov k príspevku
    }

    return redirect()->route('admin.dashboard')->with('success', 'Príspevok bol úspešne vytvorený.');
}

    public function uploadImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);
        $path = $request->file('image')->store('images', 'public');
        return response()->json(['location' => Storage::url($path)]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
{
    // Načítanie príspevku podľa slugu spolu s kategóriou, tagmi a autorom
    $post = Post::where('slug', $slug)
                ->with(['category', 'tags', 'author', 'comments.user'])
                ->firstOrFail();

    // Odovzdanie príspevku do šablóny
    return view('pages.blog-show', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail(); // Načítame príspevok podľa slugu
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.posts.edit', compact('post', 'categories', 'tags'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')){
            if($post->image) {
                Storage::delete('public/'.$post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $post->update(['image' => $imagePath]);
        }
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'author_id' => auth()->id(),
            'slug' => Str::slug($request->input('title'))
        ]);
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags')); // Synchronizácia tagov
        }
        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'Príspevok bol úspešne zmazaný.');
    }
    
}
