{{-- Modal add Topic --}}
<div class="modal fade edit-topic" tabindex="-1" role="document" id="edit-topic" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="myLargeModalLabel">Edit Topic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('topic.update', 'id')}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" id="id">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name"autocomplete="off" placeholder="name" required value="{{ old('name')}}" >
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>