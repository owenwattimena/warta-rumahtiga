@extends('template.template')
@section('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('page', 'Ibadah Minggu')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Ibadah</a></li>
    <li class="breadcrumb-item active">Minggu</li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Ibadah Minggu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tempat Ibadah</th>
                            <th>Pemimpin Ibadah</th>
                            <th>File Liturgi</th>
                            <th>
                                <a href="{{ route('ibadah.minggu.tambah') }}" class="btn btn-primary btn-sm rounded-0"><i
                                        class="fa fa-plus"></i> |
                                    TAMBAH</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ibadah as $item)

                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jam }}</td>
                                <td>{{ $item->tempat_ibadah }}</td>
                                <td>{{ $item->pemimpin_ibadah }}</td>
                                <td>
                                    <a href="{{ asset('storage/ibadah/minggu') }}/{{ $item->file_liturgi }}"
                                        target="_blank">
                                        {{ $item->file_liturgi }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('ibadah.minggu.ubah', $item->id) }}"
                                        class="btn btn-warning rounded-0 btn-sm">
                                        <i class="fa fa-edit"></i> | UBAH
                                    </a>
                                    <form action="{{ route('ibadah.minggu.hapus', $item->id) }}" method="POST"
                                        class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data?')"
                                            class="btn btn-danger rounded-0 btn-sm ">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

    </script>
@endsection
