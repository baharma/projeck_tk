@extends('layouts.app-front-end')

@section('content')

<section style="background-color: #FFEBF3; padding: 66px 0 66px 0;">
    <div class="container">
        <h2 class="text-center poppins-bold uppercase">Pendaftaran</h2>
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
