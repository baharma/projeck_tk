@extends('layouts.app-front-end')

@section('content')
<section class="position-relative hero-section d-flex flex-column pt-0 pt-lg-5" style="background-color: #FFEBF3">
    <div class="container">
        <div class="row justify-content-center mt-0 mt-lg-5" >
            <div class="col-lg-6 hero-section-1 " >
                <div>
                    <h3 class="poppins-bold uppercase mb-4 text-center">
                        Sambutlah Masa Depan yang Cerah dengan Bergabung di TK Kemala Asri
                    </h3>
                    <p class=" text-center">Bermain Sambil Belajar, Membangun Masa Depan Ceria.</p>
                    <div class="text-center text-white">
                        <a href="{{ route('pendaftaran') }}" class="btn btn-pink text-white">Pendaftaran Siswa</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section style="padding: 80px 0;" class="section-about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row flex-column-reverse flex-lg-row ">
                            <div class="col-lg-5 ">
                                <div class="w-full h-full overflow-hidden rounded" >
                                    <img src="{{ asset('assets/images/' . ($banner->url ?? '')) }}" style="object-fit: cover; object-position: center; height: 300px; width: 100%;" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 d-flex flex-column justify-content-center ps-lg-5 gap-3 mb-5 mb-lg-auto">
                                <div>
                                    <h3 class="poppins-bold uppercase mb-4 text-center text-lg-start">
                                        Tentang Sekolah
                                    </h3>
                                    <p style="text-align: justify;">
                                        TK Kemala Asri telah beroperasi sejak tahun 2015 dan telah mencetak lulusan siswa yang cerdas , berkualitas dan mamp mandiri sejak usia dini. Sekolah kami telah terakreditasi B oleh kemdikbud berdasarkan fasilitas, proses mengajar dan tenaga pengajar. TK Kemala Asri terletak di pinggir jalan di Kecamatan Tampaksiring, Kabupaten Gianyar tepatnya di Banjar Tarukan Pejeng Kaja, Tampaksiring.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="poppins-bold uppercase mb-4">Ahli dalam pendidikan</h3>
                <p>Kami telah memiliki pengalaman dalam mendidik anak dan telah diakui oleh kemdikbud</p>

                <div class="row mt-5">
                    <div class="col-lg-6 d-flex justify-content-center mb-3 mb-lg-auto">
                        <div style="width: 357px;" class="bg-white rounded p-4 d-flex justify-content-center flex-column border">
                            <div class="mb-3">
                                <img src="{{ asset('asset-kemala/image/kemdikbud.png') }}" alt="">
                            </div>
                            <h3 class="uppercase poppins-bold">Akreditasi B</h3>
                            <p class="m-0">Terakreditasi oleh kembdikbud</p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center">
                        <div style="width: 357px;" class="bg-white rounded p-4 d-flex justify-content-center flex-column border">
                            <span class="iconify mb-3" data-icon="solar:medal-ribbons-star-bold" style="font-size: 56px; color: #F94892"></span>
                            <h3 class="uppercase poppins-bold">guru ahli</h3>
                            <p class="m-0">Berpengalaman mendidik sejak 2015</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-lg-3">
                <iframe width="100%" height="100%" style="border-radius: 15px;" src="https://www.youtube.com/embed/Sr5Eofb8SjA">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section class="mt-5 pt-5">
    <div class="container" >

        <div class="d-flex justify-content-between">
            <h2 class="poppins-bold uppercase" style="margin-bottom: 56px;">Berita Terkini</h2>

            <div class="d-none d-lg-block">
                <a href="{{ route('kegiatan-akademik') }}" class="btn btn-pink d-inline-block">Lihat Semua</a>
            </div>
        </div>

        <div class="row mb-5">
            @foreach($akademik_article as $akademik)
            <div class="col-lg-3 mb-5" >
                <a href="{{ route('article' , ['slug' => $akademik->slug]) }}" class="w-full text-dark text-decoration-none article-post"  >
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset($akademik->thumnail) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                        </div>
                    </div>

                    <h3 class="mb-4" style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                        {{ $akademik->title }}
                    </h3>
                    <div class="d-flex justify-content-between">
                        <p class="uppercase text-secondary">{{ $akademik->created_at->format('d F Y') }}</p>
                        <p class="uppercase text-secondary">{{ $akademik->categories->first()->name }}</p>
                    </div>
                </a>
            </div>

            @endforeach
        </div>
        <div class="d-block d-lg-none text-center">
            <a href="{{ route('kegiatan-akademik') }}" class="btn btn-pink d-inline-block">Lihat Semua</a>
        </div>
    </div>
</section>
<section style="padding: 90px 0 90px 0;">
    <div class="container">
        <h2 class="poppins-bold uppercase text-center" style="margin-bottom: 56px;">Fasilitas</h2>

        <div class="row mb-5">
            @foreach($fasilitas as $item)

            <div class="col-lg-4 px-3 px-lg-5">
                <a href="{{ route('article' , ['slug' => $item->slug]) }}" class="w-full text-dark text-decoration-none article-post">
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset($item->thumnail) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                        </div>
                    </div>
                    <h3 class="mb-4" style=" display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;">
                        {{ $item->title }}
                    </h3>
                </a>
            </div>
            @endforeach

        </div>

        <div class="text-center">
            <a href="{{ route('fasilitas') }}" class="btn btn-pink d-inline-block">Lihat Semua</a>
        </div>
    </div>
</section>


<section style="padding: 90px 0 90px 0;">
    <div class="container" >
        <h2 class="poppins-bold uppercase text-center" style="margin-bottom: 56px;">Galeri</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($galery as $key => $item)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="$item->name"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($galery as $item)
                            <div class="carousel-item active position-relative rounded overflow-hidden">
                                <img src="{{ asset('assets/images/'.$item->url) }}" class="d-block w-100" style="height: 480px; object-fit: cover; object-position: center;" alt="...">
                                <div class="position-absolute text-white bottom-0 z-1 w-full py-3 px-3" style="background-color: #F94892;">
                                    <h2 style=" display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    font-weight: bold;
                                    overflow: hidden;">{{ $item->name }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <div class="rounded-circle p-3 d-flex align-items-center" style="background-color: #F94892;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </div>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <div class="rounded-circle p-3 d-flex align-items-center" style="background-color: #F94892;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </div>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
