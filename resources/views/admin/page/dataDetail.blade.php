@extends('admin.layout.masterAdmin')

@section('judul')
    Data Detail
@endsection

@section('konten')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detail Anggota Panitia Kegiatan</h3>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-hover display">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">NIM</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Program Studi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;    
                                    ?>
                                    @foreach ($anggota as $agt)
                                        <tr>
                                          <td>{{$no++}}</td>
                                          <td>{{$agt -> nim}}</td>
                                          <td>{{$agt -> nama}}</td>
                                          <td>{{$agt -> prodi}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-success btn-lg btn-cs" href="/kegiatan" role="button">Kembali</a>
                        </div>
                    </div>
                </div>
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
@endsection