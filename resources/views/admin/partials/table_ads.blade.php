<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary ">Data Iklan</h6>
            <button class="btn btn-info ml-2 mt-2" data-toggle="modal" data-target="#add-ads" data-mode="add">
                <i class="fas fa-plus"></i>
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
                            <th scope="col">url</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($iklan as $data)
                            <tr>
                                <td><span><img src="{{asset('storage/'.$data->image)}}" alt="" width="100px"></span>{{ $data->title }}</td>
                                <td>{{ $data->url }}</td>
                                <td>{{ $data->created_at->diffForHumans() }}</td>
                                <td>{{ $data->is_published == 1 ? 'Ya' : 'Tidak'}}</td>
                                <td class="d-flex">
                                    <button class="btn btn-info mx-3" data-toggle="modal" data-target="#edit-ads" data-id="{{ $data->id }}" data-title="{{ $data->title }}" data-url="{{ $data->url }}" data-status="{{ $data->is_published }}" data-gbr="{{ $data->image }}"><i class="fas fa-edit"></i></button>
                                    <form action="{{ route('ads.destroy', $data->id)}}" method="post">
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
