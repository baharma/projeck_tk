@extends('layouts.app-front-end')

@section('content')

<!-- <x-article-list :title="'Prestasi'" :posts="$articles"></x-article-list> -->


<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <div class="row  align-items-lg-center">
            <div class="col-lg-6 px-4 px-lg-0">
                <h2 class="poppins-bold uppercase">Prestasi</h2>
                <p style="text-transform: justify;">
                    Menampilkan pencapaian terbaik siswa dalam berbagai bidang akademik dan non-akademik, sebagai bukti dedikasi dan kemampuan luar biasa mereka.
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <img class="" src="{{ asset('asset-kemala/image/prestasi.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section style="padding: 70px 0 70px 0;">

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($articles as $key => $article)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="$article->title"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($articles as $article)
                        <div class="carousel-item active position-relative rounded overflow-hidden">
                            <img src="{{ asset($article->thumnail) }}" class="d-block w-100" alt="...">
                            <div class="position-absolute text-white bottom-0 z-1 w-full py-3 px-3" style="background-color: #F94892;">
                                <h2 style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                font-weight: bold;
                                overflow: hidden;">{{ $article->title }}</h2>
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

</section>

@endsection