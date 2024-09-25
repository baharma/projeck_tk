@extends('layouts.app-front-end')

@section('content')

<!-- <x-article-list :title="'Kegiatan Akademik'" :posts="$articles"></x-article-list> -->

<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <div class="row  align-items-lg-center">
            <div class="col-lg-6 px-4 px-lg-0">
                <h2 class="poppins-bold uppercase">Kegiatan Akademik</h2>
                <p style="text-transform: justify;">
                    Menyediakan informasi lengkap tentang jadwal, aktivitas, dan program pendidikan yang mendukung perkembangan siswa secara akademis.
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <img class="" src="{{ asset('asset-kemala/image/kegiatan-akademik.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section style="padding: 70px 0 70px 0;" class="bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center">

            @foreach($articles as $article)
            <div class="col-lg-10">
                <a href="{{ route('article' , $article->slug) }}" class="p-3 pl-lg-0 d-flex rounded text-dark align-items-lg-center" style="background-color: white; text-decoration: none">
                    <div class="mr-3 p-lg-4">
                        <img class="rounded d-block img-post" src="{{ asset($article->thumnail) }}" alt="">
                    </div>
                    <div class="w-full px-lg-3 d-flex flex-wrap flex-column px-3 px-lg-0">
                        <h3 class="mb-2 " style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                font-weight: bold;
                                overflow: hidden;">
                            {{ $article->title }}
                        </h3>
                        <div class="d-none d-lg-flex mb-4">
                            {{ $article->created_at->format('d F Y') }} • {{ $article->author->name }}
                        </div>
                        <p style="text-align: justify;">{{ $article->shortText() }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection