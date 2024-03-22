<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary ">Meta List</h6>
            <button class="btn btn-info ml-2 mt-2" data-toggle="modal" data-target=".add-meta"><i
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
                            <th scope="col">Page</th>
                            <th scope="col">title</th>
                            <th scope="col">Description</th>
                            <th scope="col">keywords</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        @foreach ($meta as $data)
                            <tr>
                                <td>{{ $data->page }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->keywords }}</td>
                                <td class="d-flex">
                                    <button class="btn btn-info mx-3" data-toggle="modal" data-target="#edit-meta" data-id="{{ $data->id }}" data-description="{{ $data->description }}" data-keywords="{{ $data->keywords }}" data-page="{{ $data->page }}" data-title="{{ $data->title }}"><i class="fas fa-edit"></i></button>
                                    <form action='{{ route('meta.destroy', $data->id)}}' method="post">
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
