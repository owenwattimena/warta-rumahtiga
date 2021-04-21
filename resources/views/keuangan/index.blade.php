@extends('template.template')
@section('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('page', 'Keuangan')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">Keuangan</li>
@endsection

@section('content')
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Keuangan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Uraian</th>
                            <th>
                                <a href="{{ route('keuangan.tambah') }}" class="btn btn-primary btn-sm rounded-0"><i
                                        class="fa fa-plus"></i> |
                                    TAMBAH</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keuangan as $item)

                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>Rp.{{ number_format($item->jumlah) }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td>
                                    <a href="{{ route('keuangan.ubah', $item->id) }}"
                                        class="btn btn-warning rounded-0 btn-sm">
                                        <i class="fa fa-edit"></i> | UBAH
                                    </a>
                                    <form action="{{ route('keuangan.hapus', $item->id) }}" method="POST"
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
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan PDF</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>
                                <a href="{{ route('laporanPdf.tambah') }}" class="btn btn-primary btn-sm rounded-0"><i
                                        class="fa fa-plus"></i> |
                                    TAMBAH</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $item)

                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pdf }}</td>
                                <td>
                                    <a href="{{ route('laporanPdf.ubah', $item->id) }}"
                                        class="btn btn-warning rounded-0 btn-sm">
                                        <i class="fa fa-edit"></i> | UBAH
                                    </a>
                                    <form action="{{ route('laporanPdf.hapus', $item->id) }}" method="POST"
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
            $("#example1, #table").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

    </script>
@endsection
