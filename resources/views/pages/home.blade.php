@extends('layouts.app-front-end')

@section('content')
<section class="position-relative">
    <div class="container">
        <div class="row align-items-center hero-section">
            <div class="col-lg-6 hero-section-1">
                <div>
                    <h1 class="poppins-bold uppercase mb-4 text-center text-lg-start">
                        Sambutlah Masa Depan yang Cerah dengan Bergabung di TK Kemala Asri
                    </h1>
                    <p class=" text-center text-lg-start">Bermain Sambil Belajar, Membangun Masa Depan Ceria.</p>
                    <div class="text-center text-lg-start">
                        <a href="" class="btn btn-pink text-white">Pendaftaran Siswa</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-end hero-section-2">
                <div class="w-80 mx-auto m-lg-auto z-1 position-relative rounded overflow-hidden" style="height: 281px;">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/0W98Bj2wkwM">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-block bg-pink w-30 h-full position-absolute top-0 end-0" style="border-radius: 25px 0 0 25px; background-color: #FFEBF3"></div>
</section>

<section style="padding: 80px 0 80px 0">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row ">
            <div class="col-lg-6 ">
                <div class="w-full h-full overflow-hidden rounded" style="height: 504px;">
                    <img src="{{ asset('asset-kemala/image/tentang-sekolah.png') }}" style="object-fit: cover; object-position: center;" alt="">
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center ps-lg-5 gap-3 mb-5 mb-lg-auto">
                <div>
                    <h1 class="poppins-bold uppercase mb-4 text-center text-lg-start">
                        Tentang Sekolah
                    </h1>
                    <p class="text-center text-lg-start">
                        TK Kemala Asri telah beroperasi sejak tahun 2015 dan telah mencetak lulusan siswa yang cerdas , berkualitas dan mamp mandiri sejak usia dini. Sekolah kami telah terakreditasi B oleh kemdikbud berdasarkan fasilitas, proses mengajar dan tenaga pengajar. TK Kemala Asri terletak di pinggir jalan di Kecamatan Tampaksiring, Kabupaten Gianyar tepatnya di Banjar Tarukan Pejeng Kaja, Tampaksiring.
                    </p>
                </div>
                <div class="d-flex justify-content-center justify-content-lg-start gap-4">
                    <a class="p-2 border-2 border border-2 rounded d-flex flex-column text-dark border-pink poppins-semibold text-decoration-none" href="{{ route('profile') }}">
                        <span class="iconify mb-2" data-icon="lets-icons:lamp" style="font-size: 36px;"></span>
                        <span class="">Visi Misi</span>
                    </a>
                    <a class="p-2 border-2 border border-2 rounded d-flex flex-column text-dark border-pink poppins-semibold text-decoration-none" href="{{ route('profile') }}">
                        <span class="iconify mb-2" data-icon="bxs:school" style="font-size: 36px;"></span>
                        <span class="">Fasilitas</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #FFEBF3;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center mb-3 mb-lg-auto">
                <div style="width: 357px;" class="bg-white rounded p-4 d-flex justify-content-center flex-column">
                    <div class="mb-3">
                        <img src="{{ asset('asset-kemala/image/kemdikbud.png') }}" alt="">
                    </div>
                    <h3 class="uppercase poppins-bold">Akreditasi B</h3>
                    <p class="m-0">Terakreditasi oleh kembdikbud</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <div style="width: 357px;" class="bg-white rounded p-4 d-flex justify-content-center flex-column">
                    <span class="iconify mb-3" data-icon="solar:medal-ribbons-star-bold" style="font-size: 56px; color: #F94892"></span>
                    <h3 class="uppercase poppins-bold">guru ahli</h3>
                    <p class="m-0">Berpengalaman mendidik sejak 2015</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 90px 0 90px 0;">
    <div class="container">
        <h2 class="poppins-bold uppercase text-center" style="margin-bottom: 56px;">Kegiatan Akademik</h2>

        <div class="row mb-5">
            @foreach($akademik_article as $akademik)
            <div class="col-lg-4 px-3 px-lg-5 mb-5">
                <a href="{{ route('article' , ['slug' => $akademik->slug]) }}" class="w-full text-dark text-decoration-none article-post">
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
                        <p class="uppercase text-secondary">{{ $akademik->created_at }}</p>
                        <p class="uppercase text-secondary">{{ $akademik->categories->first()->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center">
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
                <a href="{{ route('article' , ['article' => $item->slug]) }}" class="w-full text-dark text-decoration-none article-post">
                    <div class="rounded w-full overflow-hidden mb-3 position-relative">
                        <img class="d-block w-full" src="{{ asset($item->thumnail) }}" style="object-fit: cover; object-position: center; height: 250px" alt="">
                        <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center article-animation">
                            <span class="iconify mb-3 rounded-circle bg-pink p-2" data-icon="solar:eye-broken" style="font-size: 56px; color: white"></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="text-center">
            <a href="{{ route('fasilitas') }}" class="btn btn-pink d-inline-block">Lihat Semua</a>
        </div>
    </div>
</section>
@endsection