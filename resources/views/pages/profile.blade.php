@extends('layouts.app-front-end')

@section('content')
<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <h2 class="text-center poppins-bold uppercase">Profil Sekolah</h2>
    </div>
</section>
<section style="padding: 80px 0 80px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center ps-lg-5 gap-3 mb-5 mb-lg-auto">
                <div>
                    <h1 class="poppins-bold uppercase mb-4 text-center text-lg-start">
                        PERJALANAN KAMI
                    </h1>
                    <p class="text-center text-lg-start">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis, libero at venenatis euismod, urna justo dictum massa, a ultrices magna urna sit amet elit. Sed vehicula lacus ut libero ultricies, ac consectetur sapien cursus. Suspendisse potenti. Proin euismod ipsum in lectus tincidunt, in fermentum lacus aliquam.
                    </p>
                    <p class="text-center text-lg-start">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis, libero at venenatis euismod, urna justo dictum massa, a ultrices magna urna sit amet elit. Sed vehicula lacus ut libero ultricies, ac consectetur sapien cursus. Suspendisse potenti. Proin euismod ipsum in lectus tincidunt, in fermentum lacus aliquam.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="">
                    <img class="profile-sekolah" src="{{ asset('asset-kemala/image/profile-sekolah.png') }}" style="object-fit: cover; object-position: center;" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

<section style="padding: 80px 0 80px 0; background-color: #FFEBF3;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="poppins-bold">Visi</h3>
                <p>Mengembangkan kemampuan anak didik agar menjadi siswa yang cerdas dan mandiri sejak usia dini</p>
            </div>
            <div class="col-lg-6">
                <h3 class="poppins-bold">Misi</h3>
                <ul>
                    <li>Membangun akhlak siswa yang bertaqwa kepeda Tuhan Yang Maha Esa sejak dini</li>
                    <li>Membantu peran serta orang tua dalam mendidik anak</li>
                    <li>Mempersiapkan anak didik untuk kejenjang lebih lanjut</li>
                    <li>Membantu peran serta orang tua dalam mendidik anak menjadi karakter yang baik</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section style="padding: 80px 0 80px 0">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 d-flex align-items-lg-center">
                <div>
                    <h1 class="poppins-bold uppercase mb-4 text-center text-lg-start">
                        Struktur Organisasi
                    </h1>
                    <p class="text-center text-lg-start">
                        Sekolah kami memiliki pondasi yang kuat dalam mengelola pendidikan agar menciptakan generasi muda yang cerdas dan berkualitas.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-end ">
                <div class="struktur-organisasi rounded position-relative">
                    <img class="struktur-organisasi rounded" src="{{ asset('asset-kemala/image/struktur-organisasi.png') }}" style="object-fit: cover; object-position: center;" alt="">
                    <div class="w-full h-full position-absolute top-0 d-flex justify-content-center align-items-center rounded" style="background-color: rgba(0, 0, 0, 0.3);">
                        <a href="{{ asset('asset-kemala/image/struktur-organisasi.png') }}" class="btn btn-pink" target="_blank">Lihat</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection