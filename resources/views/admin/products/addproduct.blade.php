@extends('admin.layout.main')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
  <!-- Main Content -->
  <div id="content">
    @include('admin.partials.topbar')
    <div class="container-fluid">
      @component('admin.components.allert')
      @endcomponent
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Buat Tutorial</h1>
        </div>
        <div class="card shadow mb-4 p-3">
          <form action={{ route('products.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
            <div class="form-group">
              <label for="name" class="text-black form-label ">
                Nama
              </label>
              <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <label for="harga" class="text-black form-label ">
                Harga
              </label>
              <input type="number" name="harga" class="form-control" placeholder="harga" required>
            </div>
            <div class="form-group">
              <label for="diskon" class="text-black form-label ">
                diskon
              </label>
              <input type="number" name="diskon" class="form-control" placeholder="diskon" required>
            </div>
            <figure class="mt-3 w-60">
              <img src="" alt="" id="preview" class="img-fluid" width="50%">
            </figure>
            <div class="form-group">
              <label for="cover" class="text-black form-label">Image</label>
              <input class="form-control-file" type="file" id="image" name="cover" onchange="previewImage()">
            </div>
            <figure class="mt-3 w-60">
              <img src="" alt="" id="preview1" class="img-fluid" width="50%">
            </figure>
            <div class="form-group">
              <label for="image1" class="text-black form-label">Image</label>
              <input class="form-control-file" type="file" id="image1" name="image_1" onchange="previewImage1()">
            </div>
            <figure class="mt-3 w-60">
              <img src="" alt="" id="preview2" class="img-fluid" width="50%">
            </figure>
            <div class="form-group">
              <label for="image2" class="text-black form-label">Image</label>
              <input class="form-control-file" type="file" id="image2" name="image_2" onchange="previewImage2()">
            </div>
            <figure class="mt-3 w-60">
              <img src="" alt="" id="preview3" class="img-fluid" width="50%">
            </figure>
            <div class="form-group">
              <label for="image3" class="text-black form-label">Image</label>
              <input class="form-control-file" type="file" id="image3" name="image_3" onchange="previewImage3()">
            </div>
            <figure class="mt-3 w-60">
              <img src="" alt="" id="preview4" class="img-fluid" width="50%">
            </figure>
            <div class="form-group">
              <label for="image4" class="text-black form-label">Image</label>
              <input class="form-control-file" type="file" id="image4" name="image_4" onchange="previewImage4()">
            </div>
            <div class="form-group">
              <label for="body" class="text-black form-label">Deskripsi</label>
              <textarea name="body" id="editor" cols="30" rows="10" class="form-control" style="height: 222px"
                name="body"></textarea>
            </div>
            <div class="form-group">
              <label for="description" class="text-black form-label">Meta Description</label>
              <textarea name="description" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="brand" class="text-black form-label">Brand</label>
              <select class="custom-select" aria-label="Default select example" name="brand_id" required>
                <option value="">Open this select menu</option>
                @foreach ($brands as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="publish" class="text-black form-label">Publish</label>
              <select class="form-control" aria-label="Default select example" name="publish" required>
                <option value="">Open this select menu</option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>

          </form>
        </div>

</div>
@include('admin.partials.footer')
</div>
<!-- End of Content Wrapper -->
</div>
@endsection