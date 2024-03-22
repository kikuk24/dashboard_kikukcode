@extends('admin.layout.main')

@section('content')
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      @include('admin.partials.topbar')
      <div class="container-fluid">
        @component('admin.components.allert')
        @endcomponent
        <div class="form-group">
          <form action="{{route('category.update', $category->id)}}" method="post">
            @csrf
            @method('PUT')
          <label for="name" class="text-black form-label">
            Name
          </label>
          <input type="text" name="name" class="form-control" id="name" autocomplete="off" value="{{$category->name}}" placeholder="name" required>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
      @include('admin.partials.footer')
    </div>

    @include('admin.partials.scroll')
    @include('admin.partials.logoutModal')

  </div>
  @endsection
  