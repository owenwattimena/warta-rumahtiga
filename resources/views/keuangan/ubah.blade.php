@extends('template.template')
@section('page', 'Keuangan')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('keuangan') }}">Keuangan</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('keuangan.put', $keuangan->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="col-md-3 pt-2">
                            <label for="tanggal">Tanggal</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" id="tanggal" name="tanggal" value="{{ $keuangan->tanggal }}"
                                class="form-control" placeholder="Tanggal Ibadah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="kategori">Kategori</label>
                        </div>
                        <div class="col-md-9">
                            <select id="kategori" name="kategori" class="form-control" required>
                                <option {{ $keuangan->ketegori == 'penerimaan' ? 'selected' : '' }} value="penerimaan">
                                    Penerimaan</option>
                                <option {{ $keuangan->ketegori == 'pengeluaran' ? 'selected' : '' }} value="pengeluaran">
                                    Pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="jumlah">Jumlah</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="jumlah" name="jumlah" value="{{ $keuangan->jumlah }}"
                                class="form-control" placeholder="Jumlah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-3 pt-2">
                            <label for="uraian">Uraian</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="uraian" name="uraian" value="{{ $keuangan->uraian }}"
                                class="form-control" placeholder="Uraian" required>
                        </div>
                    </div>
                    <button type="submit" name="save" class="mt-4 btn btn-success btn-block">SIMPAN</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
