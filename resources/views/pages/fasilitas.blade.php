@extends('layouts.app-front-end')

@section('content')

<section style="background-color: #FFEBF3; padding: 66px 0 120px 0;">
    <div class="container">
        <div class="row  align-items-lg-center">
            <div class="col-lg-6 px-4 px-lg-0">
                <h2 class="poppins-bold uppercase">Fasilitas</h2>
                <p style="text-transform: justify;">
                    Gambaran lengkap mengenai sarana dan prasarana modern yang mendukung kegiatan belajar dan perkembangan siswa secara optimal.
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <img class="" src="{{ asset('asset-kemala/image/fasilitas.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section style="padding: 0 0 100px 0; margin-top: -80px;">
    <div class="container">
        <div class="row mb-5">

            @foreach($articles as $post)
                <div class="col-lg-4 mb-5 px-2">
                    <a href="{{ route('article' , $post->slug) }}" class="w-full text-dark text-decoration-none article-post">
                        <div class="w-full overflow-hidden position-relative border rounded bg-light">
                            <img class="d-block w-full" src="{{ asset($post->thumnail) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                            <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                                <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                            </div>
                            <div class="py-2 px-2" style="background-color: #F94892;">
                                <h5 class="m-0 text-white text-center" style=" display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;">
                                    {{ $post->title }}
                                </h5>
                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
