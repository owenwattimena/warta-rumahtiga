@extends('template.template')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('page', 'Berita Sepekan')
@section('path')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('berita.update', $berita->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="col-md-3 pt-2">
                            <label for="tanggal">Tanggal</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" id="tanggal" name="tanggal" value="{{ $berita->tanggal }}"
                                class="form-control" placeholder="Tanggal Ibadah" required>
                        </div>
                    </div>
                    <div class="form-row mt-3 mb-3">
                        <div class="col-md-3 pt-2">
                            <label for="judul">Judul Berita</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="judul" name="judul" value="{{ $berita->judul }}" class="form-control"
                                placeholder="Judul Berita" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="textarea" name="isi" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $berita->isi }}</textarea>
                    </div>
                    <button type="submit" name="save" class="mt-4 btn btn-success btn-block">SIMPAN</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
@section('script')
    <!-- Summernote -->
    <script src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
        })

    </script>
@endsection
