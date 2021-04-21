@extends('template.template')


@section('page', 'Dashboard')
@section('path')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            Selamat Datang {{ \Auth::user()->nama }}
        </div>
    </div>
@endsection
