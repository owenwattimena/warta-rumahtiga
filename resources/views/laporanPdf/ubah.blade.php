@extends('template.template')
@section('page', 'Laporan PDF')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('keuangan') }}">Laporan PDF</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('laporanPdf.put', $laporan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="col-md-3 pt-2">
                            <label for="tanggal">Tanggal</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" id="tanggal" name="tanggal" value="{{ $laporan->tanggal }}"
                                class="form-control" placeholder="Tanggal Ibadah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="pdf">File PDF</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" id="pdf" name="pdf" class="form-control">
                        </div>
                    </div>

                    <button type="submit" name="save" class="mt-4 btn btn-success btn-block">SIMPAN</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
