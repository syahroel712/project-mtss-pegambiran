<!DOCTYPE html>
<html>

<head>
    @include('includes/head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Axios -->
    <script src="{{ asset('assets/plugins/jquery/axios.min.js') }}"></script>
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
