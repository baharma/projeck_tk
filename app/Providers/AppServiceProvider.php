<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\ParentStudent;
use App\Models\Post;
use App\Models\RegistrationStudent;
use App\Models\SocialMedia;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\Eloquent\EloquentCategoryRepository;
use App\Repositories\Eloquent\EloquentCompanyRepository;
use App\Repositories\Eloquent\EloquentGalleryRepository;
use App\Repositories\Eloquent\EloquentParentStudentRepository;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Eloquent\EloquentRegistrationStudentRepository;
use App\Repositories\Eloquent\EloquentSocialMediaRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\ParentStudentRepository;
use App\Repositories\PostRepository;
use App\Repositories\RegistrationStudentRepository;
use App\Repositories\SocialMediaRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\View;
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

        $this->app->bind(CompanyRepository::class, function () {

            $repository = new EloquentCompanyRepository(new Company());

            return $repository;
        });

        $this->app->bind(SocialMediaRepository::class, function () {

            $repository = new EloquentSocialMediaRepository(new SocialMedia());

            return $repository;
        });

        $this->app->bind(GalleryRepository::class, function () {

            $repository = new EloquentGalleryRepository(new Gallery());

            return $repository;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app-front-end', function ($view) {
            $company = Company::first();
            $socialMedia = SocialMedia::all();
            $view->with('company', $company);
            $view->with('social_media', $socialMedia);
        });
    }
}
