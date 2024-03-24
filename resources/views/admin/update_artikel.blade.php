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
                        <h1 class="h3 mb-0 text-gray-800">Buat Artikel</h1>
                    </div>
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
                    <div class="card shadow mb-4 p-3">
                        <form action={{ route('posts.update', $post->id) }} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary">Post</button>
                            <div class="form-group">
                                <label for="title" class="text-black form-label ">
                                    Judul
                                </label>

                                <input type="text" name="title" class="form-control" placeholder="Judul" value="{{ $post->title }}" required>
                            </div>
                            @if ($post->image)
                            <p class="text-black form-label">Old Image</p>
                                <figure class="mt-3 w-60">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" id="preview" class="img-fluid" width="50%">
                                </figure>
                            @endif
                            <div class="form-group">
                                <label for="image" class="text-black form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    onchange="previewImage()">
                            </div>
                            <div class="form-group">
                                <label for="body" class="text-black form-label">Body</label>
                                <textarea name="body" id="editor" cols="30" rows="10" class="form-control" style="height: 222px"
                                    name="body">{{ $post->body }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description" class="text-black form-label">Description</label>
                                <textarea name="description" cols="30" rows="10" class="form-control" id="description" placeholder="Description Max 255 Character" onchange="countChar()">{{ $post->description }}</textarea>
                                <span class="text-muted" id="charNum">0 / 255</span>
                            </div>
                            <div class="form-group">
                                <label for="keywords" class="text-black form-label">Tags</label>
                                <textarea name="keywords" cols="30" rows="10" class="form-control">{{ $post->keywords }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="category" class="text-black form-label">category</label>
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
