<x-main-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <h4 class="fw-bold py-3 mb-4">
    Dashboard
  </h4>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="row">
        <div class="col-lg-6 mb-3 mb-lg-0">
          <div class="card mb-3">
            <div class="card-body ">
              <div class="card-title">
                Grafik Siswa Tahunan
              </div>
              <div id="chartSiswa"></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body ">
              <div class="card-title">
                Data Usia Orang Tua
              </div>
              <div class="row">
                <div class="col-4">
                  <h4 class="mb-0">{{ $parent['min_age_parent'] }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Paling Muda</span></small>
                </div>
                <div class="col-4">
                  <h4 class="mb-0">{{ $parent['max_age_parent'] }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Paling Tua</span></small>
                </div>
                <div class="col-4">
                  <h4 class="mb-0">{{ $parent['avg_age_parent'] }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Rata - Rata</span></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row mb-3 ">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 px-lg-1">
              <div class="card">
                <div class="card-body ">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-info flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bx-group text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Mendaftar</small></span>
                  <h4 class="card-title mb-1">{{$allSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>

            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0  px-lg-1">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-warning flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bxs-user-rectangle text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Pending</small></span>
                  <h4 class="card-title mb-1">{{$pendingSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0  px-lg-1">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-success flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bxs-user-check text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Diterima</small></span>
                  <h4 class="card-title mb-1">{{$validSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  Data Pendidikan Orang Tua
                </div>

                <ul class="p-0 m-0">
                  @foreach($educationParent as $key => $education)
                  <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                      @if($key + 1 == 1)
                      <span class="avatar-initial rounded bg-label-warning">
                        {{ $key + 1 }}
                      </span>
                      @else
                      <span class="avatar-initial rounded bg-label-primary">
                        {{ $key + 1 }}
                      </span>
                      @endif
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <h6 class="mb-1 fw-normal">{{ $education->name }}</h6>
                      </div>
                      <div class="user-progress">
                        <h6 class="mb-0">{{ $education->jumlah }}</h6>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('script')
  <script>
    let dataSiswa = JSON.parse('{!! $dataSiswaTahunan !!}');

    let datasets = [];
    let datayear = [];
    let currentYear = (new Date()).getFullYear();

    for (let index = currentYear - 5; index <= currentYear; index++) {
      datayear.push(index);
      let item = dataSiswa.find((item) => item.tahun == index);
      if (item) {
        datasets.push(item.jumlah);
      } else {
        datasets.push(0);
      }

    }

    const chartSiswaEl = document.querySelector('#chartSiswa');
    const chartSiswaConfig = {
      series: [{
        data: datasets
      }],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [{
          fillColor: config.colors.white,
          seriesIndex: 0,
          dataPointIndex: 7,
          strokeColor: config.colors.primary,
          strokeWidth: 2,
          size: 6,
          radius: 8
        }],
        hover: {
          size: 7
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          // shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: config.colors.borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: -10,
          right: 8
        }
      },
      xaxis: {
        categories: datayear,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: config.colors.axisColor
          }
        }
      },
      yaxis: {
        labels: {
          show: true
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };

    if (typeof chartSiswaEl !== undefined && chartSiswaEl !== null) {
      const chartSiswa = new ApexCharts(chartSiswaEl, chartSiswaConfig);
      chartSiswa.render();
    }
  </script>
  @endpush
</x-main-layout>