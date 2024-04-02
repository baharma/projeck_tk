@extends('layouts.app-front-end')

@section('content')
<section style="padding: 66px 0 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="mb-5">
                    <h3 class="poppins-bold mb-5 uppercase">{{ $post->title }}</h3>
                    <div class="d-block">
                        <span class="inline-block border-end border-2 py-3 pe-3 ">{{ $post->author->name }}</span>
                        <span class="inline-block ps-3">{{ $tanggal }}</span>
                    </div>
                </div>
                <div class="mb-5">
                    <img class="image-thumbnail-article" src="{{ asset($post->thumnail) }}" alt="">
                </div>

                <div class="text-break">
                    {!! $post->article !!}
                </div>
            </div>
            <div class="col-lg-4 px-lg-5">
                <h4 class="poppins-bold py-3 border-bottom border-2 mb-5">Artikel Lainnya</h4>
                <div class="row">
                    @foreach($another_posts as $another)
                    <div class="col-lg-12 mb-3 px-5 px-lg-0">
                        <a href="#" class="text-decoration-none text-dark ">
                            <div class="mb-3">
                                <img class="w-full rounded" style="object-fit: cover; object-position: center; height: 180px" src="{{ asset($post->thumnail) }}" alt="">
                            </div>
                            <h4 class="mb-4" style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                                {{ $another->title }}
                            </h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
