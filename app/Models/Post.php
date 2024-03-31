<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 'slug' ,'thumnail' ,'article', 'status' , 'created_by',
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
        return $this->belongsToMany(Category::class , 'post_categories' ,'post_id','category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class , 'created_by');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
