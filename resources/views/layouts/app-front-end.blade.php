<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    @vite(['resources/scss/front.scss', 'resources/js/front.js'])
</head>

<body>
    @include('components.component.navbar')


    @yield('content')

    @include('components.component.footer')
</body>

</html>