<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        Category::factory(5)->create();

        $this->actingAs($user);

    }
    /**
     * A basic feature test example.
     */
    public function test_create_post(): void
    {
        $repo = app(PostRepository::class);

        $data = Post::factory()->pending()->make()->toArray();
        $categories = Category::get()->take(1)->map(fn($item) => $item->id)->toArray();

        $post = $repo->createPost($data , $categories);

        $this->assertEquals($data['title'] , $post->title);
        $this->assertCount(1, $post->categories);
    }

    public function test_update_post(): void
    {
        $repo = app(PostRepository::class);

        $data = Post::factory()->publish()->make()->toArray();
        $data_post = Post::factory()->pending()->create();
        $categories = Category::get()->take(3)->map(fn ($item) => $item->id)->toArray();

        $post = $repo->updatePost( $data_post, $data, $categories);

        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals('publish', $post->status);
        $this->assertCount(3, $post->categories);
    }

    public function test_delete_post(): void
    {
        $repo = app(PostRepository::class);

        $data_post = Post::factory()->pending()->create();

        $post = $repo->deletePost($data_post);

        $this->assertCount(0 , Post::all());
    }
}
