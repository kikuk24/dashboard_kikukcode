<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href={{ asset('storage/vendor/fontawesome-free/css/all.min.css')}} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('storage/css/sb-admin-2.min.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.css')}}>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
      @yield('content')

    </div>
    <script src={{asset('storage/js/index.js')}}></script>
    <!-- Bootstrap core JavaScript-->
    <script src={{ asset('storage/vendor/jquery/jquery.min.js')}}></script>
    <script src={{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset('storage/vendor/jquery-easing/jquery.easing.min.js')}}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset('storage/js/sb-admin-2.min.js')}}></script>

    <!-- Page level plugins -->
    <script src={{ asset('storage/vendor/chart.js/Chart.min.js')}}></script>

    <!-- Page level custom scripts -->
    <script src={{ asset('storage/js/demo/chart-area-demo.js')}}></script>
    <script src={{ asset('storage/js/demo/chart-pie-demo.js')}}></script>
    <script src={{ asset('storage/vendor/datatables/jquery.dataTables.min.js')}}></script>
    <script src={{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.js')}}></script>
<script src={{ asset('storage/js/demo/datatables-demo.js')}}></script>

</body>

</html>