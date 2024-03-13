<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $repo, $modelPost;

    public function __construct(PostRepository $repo, Post $post)
    {
        $this->repo = $repo;
        $this->modelPost = $post;

    }


    public function PostForm(Category $category){

        return view('modules.post.form-post',compact('category'));
    }

    public function PostEditForm(Post $post){

        return view('modules.post.form-post',compact('post'));
    }
}
