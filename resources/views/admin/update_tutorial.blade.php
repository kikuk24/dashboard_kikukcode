@extends('admin.layout.main')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('admin.partials.topbar')
            <div class="container-fluid">
                @component('admin.components.allert')
                @endcomponent
                <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Tutorial</h1>
              </div>
                <div class="card shadow mb-4 p-3">
                    <form action={{ route('tutorial.update', $tutorial->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <div class="form-group">
                            <label for="title" class="text-black form-label ">
                                Judul
                            </label>
                            <input type="text"  name="title" class="form-control" placeholder="Judul" required value="{{ $tutorial->title }}">
                        </div>
                        @if ($tutorial->image)
                        <figure class="mt-3 w-60">
                            <img src="{{asset('storage/'.$tutorial->image)}}" alt="" id="preview" class="img-fluid" width="50%">
                        </figure>
                        @endif
                        <div class="form-group">
                          <label for="image" class="text-black form-label">Image</label>
                          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                        </div>
                        <div class="form-group">
                            <label for="body" class="text-black form-label">Body</label>
                            <textarea name="body" id="editor" cols="30" rows="10" class="form-control" style="height: 222px"
                                name="body">{{$tutorial->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-black form-label">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="text-black form-label">Tags</label>
                            <textarea name="keywords" cols="30" rows="10" class="form-control"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="topic" class="text-black form-label">Topic</label>
                            <select class="form-select" aria-label="Default select example" name="topic_id">
                                <option value="{{$tutorial->topics_id}}">{{$tutorial->topics->name}}</option>
                                @foreach ($topic as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>



            </div>
            @include('admin.partials.footer')
        </div>
        <!-- End of Content Wrapper -->
        @include('admin.partials.scroll')
        @include('admin.partials.logoutModal')
    @endsection
