<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ParentStudent;
use App\Models\Post;
use App\Models\RegistrationStudent;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\Eloquent\EloquentCategoryRepository;
use App\Repositories\Eloquent\EloquentParentStudentRepository;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Eloquent\EloquentRegistrationStudentRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\ParentStudentRepository;
use App\Repositories\PostRepository;
use App\Repositories\RegistrationStudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, function () {

            $repository = new EloquentUserRepository(new User());

            return $repository;
        });

        $this->app->bind(PostRepository::class, function () {

            $repository = new EloquentPostRepository(new Post());

            return $repository;
        });

        $this->app->bind(CategoryRepository::class, function () {

            $repository = new EloquentCategoryRepository(new Category());

            return $repository;
        });

        $this->app->bind(RegistrationStudentRepository::class, function () {

            $repository = new EloquentRegistrationStudentRepository(new RegistrationStudent());

            return $repository;
        });

        $this->app->bind(ParentStudentRepository::class, function () {

            $repository = new EloquentParentStudentRepository(new ParentStudent());

            return $repository;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
