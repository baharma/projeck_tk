<?php 

namespace App\Repositories;

use App\Models\Post;

interface PostRepository {
    public function createPost(array $data , $categories = []);
    
    public function updatePost(Post $post, array $data , $categories = []);

    public function deletePost(Post $post);

    public function list(array $params);

    public function findSlug($slug);
    
}