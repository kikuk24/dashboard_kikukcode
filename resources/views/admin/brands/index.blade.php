@extends('admin.layout.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    @include('admin.partials.topbar')
    @include('admin.brands.partials.add_brand')
    @include('admin.brands.partials.edit_brand')
    @component('admin.components.allert')

    @endcomponent
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brand</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
      </div>
      @include('admin.brands.partials.table_brand')
    </div>


    @include('admin.partials.footer')
  </div>
  @include('admin.partials.scroll')
  @include('admin.partials.footer')
  @endsection