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
                        {{ $company->description }}
                    </p>
                    <!-- <p class="text-center text-lg-start">
                        PAUD TK Kemala Asri terletak di desa Poh Bergaga, Kecamatan Tampaksiring, Kabupaten Gianyar, Bali. Sekolah ini didirikan pada tahun 2014 oleh sekelompok pendidik yang berkomitmen untuk meningkatkan kualitas pendidikan di wilayah tersebut. Sekolah ini memiliki visi dan misi yang jelas, yaitu untuk menjadi lembaga pendidikan yang unggul dan bertanggung jawab dalam membantu anak-anak berkembang optimally.
                    </p>
                    <p class="text-center text-lg-start">
                        Sebelum pandemi COVID-19 pada tahun 2020, PAUD TK Kemala Asri memiliki siswa hingga 40 orang. Namun, pada tahun 2023, sekolah ini mengalami penurunan jumlah siswa hingga 11 siswa yang terdaftar. Penurunan ini disebabkan oleh kurangnya informasi yang diterima oleh orang tua wali mengenai pembukaan penerimaan siswa baru PAUD TK Kemala Asri. Hal ini menjadi tantangan besar bagi sekolah, karena dengan jumlah siswa yang lebih sedikit, biaya operasional sekolah menjadi lebih mahal.
                    </p>
                    <p class="text-center text-lg-start">
                        Untuk mengatasi tantangan ini, PAUD TK Kemala Asri mengambil beberapa tindakan. Pertama, sekolah mulai mengembangkan program pendidikan non formal, seperti kelas bermain dan kelas seni. Hal ini bertujuan untuk menarik lebih banyak anak-anak untuk mendaftar di sekolah. Selain itu, sekolah juga mulai menggunakan media sosial untuk menginformasikan pembukaan penerimaan siswa baru. Hal ini bertujuan untuk mencapai lebih banyak orang tua wali, terutama yang tinggal di luar wilayah.
                    </p>
                    <p class="text-center text-lg-start">
                        PAUD TK Kemala Asri juga mulai mengambil tindakan untuk meningkatkan kualitas pendidikan yang diberikan. Sekolah mulai mengimplementasikan program pembelajaran yang lebih interaktif dan menarik, serta mulai menggunakan teknologi informasi dan komunikasi (TIK) dalam pembelajaran. Hal ini bertujuan untuk membuat pembelajaran lebih menyenangkan dan efektif. Selain itu, sekolah juga mulai mengembangkan kerjasama dengan beberapa lembaga pendidikan lain, sehingga dapat memperoleh bantuan dan saran dari para ahli.
                    </p>
                    <p class="text-center text-lg-start">
                        Sejauh ini, tindakan-tindakan ini telah menunjukkan hasil yang baik. Jumlah siswa di sekolah telah meningkat, dan kualitas pendidikan yang diberikan telah meningkat. Namun, sekolah masih menghadapi tantangan besar, yaitu mengatasi kurangnya informasi yang diterima oleh orang tua wali. Untuk mengatasi tantangan ini, sekolah akan terus mengembangkan strategi informasi yang lebih efektif, serta akan terus mengambil tindakan untuk meningkatkan kualitas pendidikan yang diberikan.
                    </p> -->
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
