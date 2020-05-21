@extends('admin.layout.masterAdmin')

@section('judul')
    Data Kegiatan
@endsection

@section('konten')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kegiatan</h3>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#forumDataKegiatan" style="background-color: #00AAFF; border-color: #00a0f0;">
                                    <i class="lnr lnr-plus-circle btn-cs"></i>
                                </button>
                            </div>
                        </div>
                        <center>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible alert-cs">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ session('success') }}!</strong>
                            </div> 
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ session('error') }}!</strong>
                            </div>
                        @endif
                        </center>
                        <div class="panel-body">
                            <table id="example" class="table table-hover display">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Tanggal Kegiatan</th>
                                        <th scope="col">Jumlah Pendaftaran</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;    
                                    ?>
                                    @foreach ($kegiatan as $kgt)
                                        <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$kgt -> nama}}</td>
                                        <td>{{$kgt -> tanggal}}</td>
                                        <td>{{$kgt -> sisa}} dari {{$kgt -> kuota}}</td>
                                        <td>{{$kgt -> status}}</td>
                                        <td>
                                            <a href="/ubahStatus/{{$kgt -> id}}"><button type="button" class="btn btn-primary">Ubah Status</button></a>
                                            <a href="/detail/{{$kgt -> id}}"><button type="button" class="btn btn-warning">Detail</button></a>
                                            <a href="/hapusData/{{$kgt -> id}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forumDataKegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahKegiatan">Tambah Kegiatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/prosesKegiatan')}}" method="POST" class="needs-validation" novalidate>
                {{csrf_field()}}
                    <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <input type="text" class="form-control" id="InputNama" name="inputNama" required>
                      <div class="invalid-feedback">
                            Masukkan nama kegiatan yang akan dilaksanakan!
                          </div>
                    </div>
        
                    <div class="form-group">
                      <label>Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="InputTanggal" name="inputTanggal" required>
                      <div class="invalid-feedback">
                        Masukkan tanggal kegiatan yang akan dilaksanakan!
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Kuota Anggota Panitia</label>
                        <input type="text" class="form-control" id="exampleInputKuota" name="inputKuota" required>
                          <div class="invalid-feedback">
                              Masukkan jumlah maksimum anggota panitia kegiatan!
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javacode')
    <script>
      $(document).ready(function() {
        $('#example').DataTable({
          "order": [[ 0, "asc" ]]
        });
      } );
    </script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
@endsection

