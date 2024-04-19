@extends('layouts.app-front-end')

@section('content')


<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <h2 class="text-center poppins-bold uppercase">Gallery Image TK Kemala Asri</h2>
    </div>
</section>

<section style="padding: 100px 0 100px 0;">
    <div class="container">
        <div class="row mb-5">

            @foreach($gallery as $item)
            <div class="col-lg-4 px-3 px-lg-5 mb-5">
                <a href="#" class="w-full text-dark text-decoration-none article-post">
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset('assets/images/'.$item->url) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                        </div>
                    </div>
                    <h3 class="mb-4" style=" display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;">
                        {{ $item->name }}
                    </h3>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
