<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend/includes/head')
    @stack('styles')
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('frontend/includes/menu')

        <!-- Body -->
        @yield('content')


        <!-- Footer -->
        @include('frontend/includes/footer')
    </div>

    @include('frontend/includes/script')

</body>

</html>
