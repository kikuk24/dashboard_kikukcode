<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary ">Data tutorial</h6>
            <a href="/add/artikel" class="btn btn-info ml-2 mt-2"><i
                    class="fas fa-plus"></i>
                Tambah</a>
        </div>

    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Description</th>
                            <th scope="col">View</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2">
                                <form action="{{ route('tutorial.destroy-all') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus semua data ini?')">Delete All</button>

                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tutorial as $data)
                            <tr>
                                <td><span><img src="{{asset('storage/'.$data->image)}}" alt="" width="50px"></span>{{ $data->title }}</td>
                                <td class="line-clamp-3">{{ $data->description }}</td>
                                <td>{{ $data->views }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('tutorial.edit', $data->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('tutorial.destroy', $data->id)}}" method="post">
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
