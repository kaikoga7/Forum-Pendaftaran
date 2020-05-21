@extends('user.masterUser')

@section('judul')
    Pendaftaran
@endsection

@section('konten')
<div class="container-contact100">
    <div class="wrap-contact100">
    <form action="{{ url('/prosesAnggota')}}" method="POST" class="contact100-form needs-validation" novalidate>
            {{csrf_field()}}
            <span class="contact100-form-title">
              Forum Pendaftaran
            </span>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible alert-cs">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>{{ session('success') }}!</strong>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible alert-cs">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>{{ session('error') }}!</strong>  
            </div>
            @endif
            
            <label class="label-input100">NIM Mahasiswa</label>
            <div class="wrap-input100">
              <input type="text" class="form-control" style="border:0;" id="InputNIM" name="inputNim" placeholder="Masukkan NIM anda" required>
              <span class="focus-input100"></span>
              <div class="invalid-feedback invalid-cs">
                    Masukkan NIM anda!
              </div>
            </div>

            <label class="label-input100">Nama Mahasiswa</label>
            <div class="wrap-input100">
                <input type="text" style="border:0" class="form-control" id="InputNama" name="inputNama" placeholder="Masukkan nama anda" required>
                <span class="focus-input100"></span>
                <div class="invalid-feedback invalid-cs">
                      Masukkan nama anda!
                </div>
              </div>
            
              <label class="label-input100">Program Studi</label>
              <div class="wrap-input100">
                <select class="form-control fcontrol-cs" id="InputProdi" name="inputProdi" required>
                  <option selected disabled value="">Pilih...</option>
                  <option>Pendidikan Teknik Informatika</option>
                  <option>Manajemen Informatika</option>
                  <option>Sistem Informasi</option>
                  <option>Ilmu Komputer</option>
                </select>
                <div class="invalid-feedback invalid-cs">
                  Masukkan Program Studi Anda!
                </div>
              </div>

              <label  class="label-input100">Kegiatan</label>
              <div class="wrap-input100">
                <select class="form-control fcontrol-cs" id="InputKegiatan" name="inputKegiatan" required>
                    <option value="" selected disabled>Pilih...</option>       
                    @foreach ($kegiatan as $kgt)
                      @if ($kgt->status == "tutup")
                        <option disabled value="">{{$kgt -> nama}} [Pendaftaran Ditutup]</option> 
                      @else
                        <option>{{$kgt -> nama}}</option> 
                      @endif  

                    @endforeach
                </select>
                <div class="invalid-feedback invalid-cs">
                  Pilih Kegiatan yang anda ingin ikut!
                </div>
              </div>
            <button type="submit" class="contact100-form-btn btn-cs">Submit</button>
          </form>


          <div class="contact100-more flex-col-c-m" style="background-image: url('user/images/ftk.jpg');">
            <div class="flex-w size1 p-b-47">
              <div class="flex-col size2">
                <span class="txt1 p-b-20">
                  SELAMAT DATANG DI WEBSITE PENDAFTARAN PANITIA KEGIATAN
                </span>
              </div>
            </div>
      
          </div>
    </div>
</div>
@endsection

@section('javacode')
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