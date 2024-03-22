@extends('admin.layout.main')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('admin.partials.topbar')
            <div class="container-fluid">
              @component('admin.components.allert')
              @endcomponent
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
                </div>
                @include('admin.partials.table_artikel')
            </div>


            @include('admin.partials.footer')
        </div>
        <!-- End of Content Wrapper -->
        @include('admin.partials.scroll')
        @include('admin.partials.logoutModal')
@endsection