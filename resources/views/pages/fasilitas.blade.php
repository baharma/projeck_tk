@extends('layouts.app-front-end')

@section('content')

<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <h2 class="text-center poppins-bold uppercase"></h2>
    </div>
</section>

<section style="padding: 100px 0 100px 0;">
    <div class="container">
        <div class="row mb-5">

            @foreach($articles as $post)
            <div class="col-lg-4 px-3 px-lg-5 mb-5">
                <a href="{{ route('article' , $post->slug) }}" class="w-full text-dark text-decoration-none article-post">
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset($post->thumnail) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                        </div>
                    </div>

                    <h3 class="mb-4" style=" display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;">
                        {{ $post->title }}
                    </h3>
                    <div class="d-flex justify-content-between">
                        <p class="uppercase text-secondary">{{ $post->created_at }}</p>
                        <p class="uppercase text-secondary">{{ $post->categories()->first()->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
