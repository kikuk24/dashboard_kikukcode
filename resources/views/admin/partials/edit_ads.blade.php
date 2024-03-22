<div class="modal fade edit-ads" tabindex="-1" role="dialog" id ="edit-ads" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="myLargeModalLabel">Tambah Iklan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action={{ route('ads.update', 'id') }} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title"autocomplete="off"
                            placeholder="title" required>
                    </div>
                    <figure class="mt-3 w-60">
                        <img src="" alt="" id="preview" class="img-fluid" width="50%">
                    </figure>
                    <div class="form-group">
                        <label for="image" class="text-black form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image"
                            onchange="previewImage()">
                    </div>
                    <div class="form-group">
                        <label for="url">Link</label>
                        <input type="text" name="url" class="form-control" id="url"autocomplete="off"
                            placeholder="Masukan url Iklan jika Tidak ada isi tanda pagar" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select " aria-label="Default select example" name="status">
                            <option value="1" >Active</option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
