<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"   class="light-style layout-menu-fixed">

  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
    " rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/vendor/fonts/boxicons.css')}}" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('sneat-1.0.0/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link src="{{asset('sneat-1.0.0/assets/vendor/libs/sweetalert2/dist/sweetalert2.min.css')}}"/>
    <style>
      .swal2-container{
        z-index: 9999999;
      }
    </style>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('sneat-1.0.0/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('sneat-1.0.0/assets/js/config.js')}}"></script>
    <script src="{{asset('sneat-1.0.0/js/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/css/dropify.css')}}">
    <script src="{{asset('sneat-1.0.0/js/dropify.js')}}"> </script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('partials.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          @include('partials.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            {{ $slot }}
            </div>

            <!-- / Content -->

            @include('partials.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('sneat-1.0.0/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('sneat-1.0.0/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('sneat-1.0.0/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('sneat-1.0.0/assets/vendor/css/core.css')}}"></script>


    <script src="{{asset('sneat-1.0.0/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->

    <script src="{{asset('sneat-1.0.0/assets/vendor/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('sneat-1.0.0/assets/js/dashboards-analytics.js')}}"></script>
    <script>
      window.addEventListener('swal:modal', (event) => {
          Swal.fire({
              customClass: {
                container: 'my-swal'
              },
              title: event.detail[0].title,
              text: event.detail[0].text,
              icon: event.detail[0].type,
          })
      })
    </script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Minimum image size 1 MB',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Oops! Something wrong happened.'
            }

        });
    </script>
           @vite(['resources/js/app.js'])
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
    @stack('script')
  </body>
</html>
