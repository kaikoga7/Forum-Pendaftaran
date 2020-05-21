@extends('admin.layout.masterAdmin')

@section('judul')
    Beranda
@endsection

@section('konten')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Hello, Admin</h3>
                        </div>
                        <div class="panel-body">
                            <p class="lead">Selamat Datang di Sistem Manajemen Data-Data Kegiatan</p>
                            <hr class="my-4">
                            <p>Ujian Tengah Semester | Mata Kuliah Pemrograman Web Lanjut</p>
                            <a class="btn btn-primary btn-lg" href="/kegiatan" role="button">Data Kegiatan</a>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection