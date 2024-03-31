<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    public function createPost(array $data , $categories = [])
    {
        $post = $this->model->create($data);

        foreach ($categories as $category_id) {
            $post->categories()->sync($category_id,false);
        }

        return $post;

    }

    public function updatePost(Post $post , array $data , $categories = [])
    {
        // $post->categories()->delete();

        $post->fill($data);
        $post->save();

        foreach ($categories as $category_id) {
            $post->categories()->sync($category_id,false);
        }

        return $post;
    }

    public function deletePost(Post $post)
    {

        return  $post->delete();
    }

    public function list(array $params)
    {
        $posts = $this->model

        ->when(isset($params['search']) , function($post) use($params) {
            return $post->where(function($query) use ($params){
                $query->where('name' , 'like' , '%'.$params['search'].'%');
            });
        })

        ->when(isset($params['category_id']) , function($post) use ($params) {
            return $post->whereHas('categories' , function($category) use ($params) {
                $category->where('id' , $params['category_id']);
            });
        });

        if(isset($params['per_page'])) {
            return $posts->paginate($params['per_page']);
        }

        return $posts->get();
    }

    public function findSlug($slug)  
    {
        return $this->model->where('slug' , $slug)->first();
    }

}
