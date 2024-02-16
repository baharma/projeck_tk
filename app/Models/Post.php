<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 'slug' , 'article', 'status' , 'created_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
           
            $post->slug = Str::slug($post->title);
            $post->created_by = Auth::user()->id;
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'post_categories' , 'post_id' , 'category_id')->withTrashed();
    }

    public function author()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
