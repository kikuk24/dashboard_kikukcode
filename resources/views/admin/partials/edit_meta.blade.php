{{-- Modal add Topic --}}
<div class="modal fade edit-meta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit-meta">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="myLargeModalLabel">Edit Meta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action={{ route('meta.update', 'id')}} method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="page">Page</label>
                <input type="text" name="page" class="form-control" autocomplete="off" placeholder="name" id="page" required value="{{ old('page')}}">
            </div>
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text"  id="title" name="title" class="form-control" id="title" autocomplete="off" placeholder="Title" required value="{{ old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" id="description" cols="30" rows="10"value="{{ old('description')}}" ></textarea>
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <textarea class="form-control" id="keywords" name="keywords" id="keywords" cols="30" rows="10" value="{{ old('keywords')}}"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>