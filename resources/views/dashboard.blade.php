<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                          <div class="card bg-primary text-white mb-3">
                            <div class="card-header">Total Siswa Mendaftar</div>
                            <div class="card-body">
                              <h1 class="card-title text-white ">{{$allSiswa}}</h1>
                              <p class="card-text text-white"><i class='bx bx-run h1 text-white'></i></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                          <div class="card bg-secondary text-white mb-3">
                            <div class="card-header">Total Siswa Pending</div>
                            <div class="card-body">
                                <h1 class="card-title text-white ">{{$pendingSiswa}}</h1>
                                <p class="card-text text-white"><i class='bx bx-run h1 text-white'></i></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                          <div class="card bg-success text-white mb-3">
                            <div class="card-header">Total Siswa Diterima</div>
                            <div class="card-body">
                                <h1 class="card-title text-white ">{{$validSiswa}}</h1>
                                <p class="card-text text-white"><i class='bx bx-run h1 text-white'></i></p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
