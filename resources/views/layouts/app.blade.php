<!DOCTYPE html>
<html>

<head>
    @include('includes/head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('includes/navbar')
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        @include('includes/sidebar')
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('includes/footer')
    </div>
    <!-- ./wrapper -->
    
    @include('includes/script')
    
</body>

</html>
