@extends('admin.layout.main')
@section('content')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
              @include('admin.partials.topbar')
              @include('admin.partials.add_category')
              @component('admin.components.allert')
                
              @endcomponent
              <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Category</h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
                </div>
                @include('admin.partials.table_category')
              </div>
                
              
                @include('admin.partials.footer')
            </div>
        <!-- End of Content Wrapper -->
@include('admin.partials.scroll')
@include('admin.partials.logoutModal')
@endsection