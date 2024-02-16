<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_post(): void
    {
        $repo = app(CategoryRepository::class);

        $data = Category::factory()->make()->toArray();

        $category = $repo->create($data);

        $this->assertEquals($data['name'], $category->name);
    }

    public function test_update_post(): void
    {
        $repo = app(CategoryRepository::class);

        $data = Category::factory()->make()->toArray();
        $category = Category::factory()->create();

        $rs = $repo->update($category , $data);

        $this->assertEquals($data['name'], $rs->name);
    }

    public function test_delete_post(): void
    {
        $repo = app(CategoryRepository::class);

        $category = Category::factory()->create();

        $category = $repo->destroy($category);

        $this->assertCount(0, Category::all());
    }
}
