<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;  // Import správneho traitu
use Spatie\Sluggable\SlugOptions; // Import nastavení pre slug

class Post extends Model
{
    use HasFactory;
    use HasSlug; // Použitie traitu HasSlug

    protected $fillable = ['title', 'content', 'category_id', 'author_id', 'image', 'slug']; // Pridaj 'slug' do fillable

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * Konfigurácia pre generovanie slugu.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // Generovanie slugu z názvu
            ->saveSlugsTo('slug'); // Ukladanie slugu do stĺpca 'slug'
    }
}
