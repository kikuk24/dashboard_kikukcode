<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ $title }} - Dashboard </title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/super-build/ckeditor.js"></script>
    <link rel="stylesheet" href={{ asset('storage/css/editor.css') }}>
    {{-- <script src={{ asset('storage/vendor/ckeditor5/build/ckeditor.js')}}></script> --}}
    <!-- Custom fonts for this template-->
    <link href={{ asset('storage/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('storage/css/sb-admin-2.min.css') }} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.css') }}>


</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kikuk <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
<a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Artikel</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Artikel</h6>
<a class="collapse-item" href="{{route('posts.store')}}">Buat</a>
<a class="collapse-item" href="{{route('dashboard.posts')}}">Artkel List</a>
<a class="collapse-item" href="{{route('dashboard.categories')}}">Category</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tutorial</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tutorial</h6>
                        <a class="collapse-item" href="{{ route('add.tutorial') }}">Buat</a>
<a class="collapse-item" href="{{route('dashboard.tutorial')}}">List</a>
                        <a class="collapse-item" href="{{route('dashboard.topics')}}">Topic</a>
                        <a class="collapse-item" href="#">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Meta SEO Page</h6>
                        <a class="collapse-item" href="/settings">Settings</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other</h6>
                        <a class="collapse-item" href="/comment">Comment</a>
                        <a class="collapse-item" href="/ads">Ads</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src={{ asset('storage/img/undraw_rocket.svg') }}
                    alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                    and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                    Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->
        @yield('content')
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src={{ asset('storage/vendor/jquery/jquery.min.js') }}></script>
    <script src={{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('storage/js/index.js') }}></script>
    <script>
        function previewImage() {

            let previews = document.querySelectorAll('#preview');
            let img = document.querySelectorAll('#image');

            const ofRead = new FileReader();
            ofRead.readAsDataURL(img[0].files[0]);
            
            ofRead.addEventListener('load', function() {

                let output = ofRead.result;

                previews[0].setAttribute('src', output);
                
            })
        }
    </script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset('storage/js/sb-admin-2.min.js') }}></script>

    <!-- Page level plugins -->
    <script src={{ asset('storage/vendor/chart.js/Chart.min.js') }}></script>

    <!-- Page level custom scripts -->
    <script src={{ asset('storage/js/demo/chart-area-demo.js') }}></script>
    <script src={{ asset('storage/js/demo/chart-pie-demo.js') }}></script>
    <script src={{ asset('storage/js/demo/chart-bar-demo.js') }}></script>
    <script src={{ asset('storage/vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('storage/js/demo/datatables-demo.js') }}></script>
</body>

</html>
