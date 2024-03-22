{{-- Modal add Topic --}}
<div class="modal fade add-meta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="myLargeModalLabel">Add Meta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action={{ route('meta.store')}} method="post">
            @csrf
            <div class="form-group">
                <label for="page">Page</label>
                <input type="text" name="page" class="form-control" id="name"autocomplete="off" placeholder="name" required>
            </div>
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="name"autocomplete="off" placeholder="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <textarea class="form-control" name="keywords" id="keywords" cols="30" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>