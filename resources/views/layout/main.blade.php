<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>{{ isset($title) ? $title : 'title'; }}</title>
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/adminlte.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/css/login.min.css') }}" rel='stylesheet'>
</head>


<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <div class="content-wrapper">
            <?php 
            $role = auth()->user()->role
            ?>
            @if ($role === 'customer')
            @include('partials.topbar_customer')
    
            @elseif($role === 'kantin')
            @include('partials.sidebar_kantin')
    
            @elseif($role === 'bank')
            @include('partials.sidebar_bank')
            @endif
       
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2024 <a href="https://www.github.com/icefox711">Eskepok</a>.</strong> All rights reserved.
        <br>
        <span>Twiiter: @es_kepok</span>
        <br>
        <span>Discord: eskepok</span>
    </footer>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
</body>

</html>
