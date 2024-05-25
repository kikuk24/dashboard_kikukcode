<div class="modal fade add-brand" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="myLargeModalLabel">Tambah Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action={{ route('brands.store')}} method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off" placeholder="name"
              required>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>