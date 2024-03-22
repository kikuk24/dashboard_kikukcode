<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary ">Category List</h6>
            <button class="btn btn-info ml-2 mt-2" data-toggle="modal" data-target=".add-category" data-mode="add"><i
                    class="fas fa-plus"></i>
                Tambah</button>
        </div>

    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->slug }}</td>
                                <td class="d-flex">
                                    <a href="/category/edit/{{ $data->id }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action='{{ route('category.destroy', $data->id)}}' method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-3"onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"
                                                ></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
