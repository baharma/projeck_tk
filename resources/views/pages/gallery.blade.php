@extends('layouts.app-front-end')

@section('content')


<section style="background-color: #FFEBF3; padding: 66px 0 166px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="text-center poppins-bold uppercase">Galeri</h2>
                <p class="text-center">Menampilkan momen-momen berharga dalam kegiatan sekolah melalui koleksi foto dan video yang mengabadikan setiap aktivitas siswa.</p>
            </div>
        </div>
    </div>
</section>

<section style="padding: 0px 0 100px 0; margin-top: -100px;">
    <div class="container">
        <div class="row mb-5">

            @foreach($gallery as $item)
            <div class="col-lg-4 px-3 px-lg-2 mb-3 mb-lg-5">
                <a href="#" class="w-full text-dark text-decoration-none article-post">
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset('assets/images/'.$item->url) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex flex-column justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                            <h5 class="mb-4 text-white" style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                            {{ $item->name }}
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
