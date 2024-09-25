@extends('layouts.app-front-end')

@section('content')

<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <h2 class="text-center poppins-bold uppercase">Pendaftaran</h2>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <p class="m-0">Informasi Pendaftaran</p>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li style="text-align: justify;">Lengkapi form pendaftaran melalui website</li>
                            <li style="text-align: justify;">Setelah melakukan pendaftaran harap menghubungi admin untuk konfirmasi pendaftaran melalui whatsapp {{ $social_media->where('slug' , 'whatsapp')->first()->name }}</li>
                            <li style="text-align: justify;">Melakukan pembayaran biaya pendaftaran sebesar <b>Rp. 100.000</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 50px 0 100px 0;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @livewire('module.registration-student.form-registration' , ['showChangeStatus' => false])
            </div>
        </div>
    </div>
</section>

@endsection