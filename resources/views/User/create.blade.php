@extends('layouts.user')

@section('title', 'Judul | PKM')

@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
    <div class="row">
      <div class="col-md-10">
         @if (session('status'))
        <div class="alert alert-warning">
          {{ session('status')}}
      </div>
         @endif
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">INPUT DATA PROGRAM KREATIF MAHASISWA</h2>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form method="post" action="{{ route('user.create.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama mahasiswa</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="nim">Nim</label>
                          <input type="text" name="nim" id="nim" class="form-control">
                      </div>
                        <label for="judul">Judul PKM</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                        </div>

                <div class="form-group">
                    <label for="tipe">Tipe PKM</label>
                    <select id="inputStatus" name="tipe" id="tipe" class="form-control custom-select">
                        <option selected disabled>Pilih</option>
                        <option>
                        PKM Bidang Riset Eksakta (PKM-R) atau PKM Bidang Riset Humaniora (PKM-R)
                        </option>
                        <option>
                        PKM Bidang Kewirausahaan (PKM-K)
                        </option>
                        <option>
                        PKM Bidang Pengabdian Kepada Masyarakat (PKM-PM)
                        </option>
                        <option>
                        PKM Bidang Penerapan Iptek (PKM-PI)
                        </option>
                        <option>
                        PKM Bidang Karsa Cipta (PKM-KC)
                        </option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="anggota1">Anggota 1</label>
                  <select class="selectpicker form-control" name="anggota1" id="anggota1" data-live-search="true">
                      <option selected>Pilih</option>
                      @foreach ($users as $item)
                      <option value="{{$item->id}}" >{{$item->name . " - " . $item->username}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="anggota2">Anggota 2</label>
                  <select class="selectpicker form-control" name="anggota2" id="anggota2" data-live-search="true">
                      <option selected>Pilih</option>
                      @foreach ($users as $item)
                      <option value="{{$item->id}}" >{{$item->name . " - " . $item->username}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="anggota3">Anggota 3</label>
                  <select class="selectpicker form-control" name="anggota3" id="anggota3" data-live-search="true">
                      <option selected>Pilih</option>
                      @foreach ($users as $item)
                      <option value="{{$item->id}}" >{{$item->name . " - " . $item->username}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="angkatan">Tahun angkatan</label>
                    <select id="inputStatus" name="angkatan" id="angkatan" class="form-control custom-select">
                        <option selected disabled>Pilih</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-info">Simpan</button>

                </div>
                <br><br><br><br><br><br>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection