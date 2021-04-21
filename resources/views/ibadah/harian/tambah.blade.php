@extends('template.template')
@section('page', 'Ibadah Harian')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Ibadah</a></li>
    <li class="breadcrumb-item"><a href="{{ route('ibadah.harian') }}">Harian</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 pt-2">
                            <label for="tanggal">Tanggal Ibadah</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal Ibadah"
                                required>
                        </div>
                        <div class="col-md-3 pt-2 text-right">
                            <label for="jam">Jam Ibadah</label>
                        </div>
                        <div class="col-md-3">
                            <input type="time" id="jam" name="jam" class="form-control" placeholder="Jam Ibadah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="kategori">Kategori</label>
                        </div>
                        <div class="col-md-3">
                            <select id="kategori" name="kategori" class="form-control" placeholder="Tanggal Ibadah"
                                required>
                                <option value="Pelpri">Pelpri</option>
                                <option value="Pelwata">Pelwata</option>
                                <option value="AM">AM</option>
                                <option value="Unit">Unit</option>
                            </select>
                        </div>
                        <div class="col-md-2 pt-2 text-right">
                            <label for="posko">Posko</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="posko" name="posko" class="form-control" placeholder="Posko Ibadah"
                                required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="tempat">Tempat Ibadah</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="tempat" name="tempat" class="form-control" placeholder="Tempat Ibadah"
                                required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="pemimpin">Pemimpin Ibadah</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="pemimpin" name="pemimpin" class="form-control"
                                placeholder="Pemimpin Ibadah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="file_liturgi">File Liturgi</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" accept="application/pdf" id="file_liturgi" name="file_liturgi"
                                class="form-control" placeholder="File Liturgi ">
                        </div>
                    </div>
                    <button type="submit" name="save" class="mt-4 btn btn-success btn-block">SIMPAN</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
