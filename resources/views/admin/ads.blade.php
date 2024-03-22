@extends('admin.layout.main')
@section('content')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
              @include('admin.partials.topbar')
              @include('admin.partials.add_ads')
              @include('admin.partials.edit_ads')
              @component('admin.components.allert')
              @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong>{{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
              @endcomponent
              <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ads</h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
                </div>
                @include('admin.partials.table_ads')
              </div>
                
              
                @include('admin.partials.footer')
            </div>
        <!-- End of Content Wrapper -->
@include('admin.partials.scroll')
@include('admin.partials.logoutModal')
@endsection