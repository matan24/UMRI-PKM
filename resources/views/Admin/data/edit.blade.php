@extends('layouts.admin')

@section('title', 'Edit Data | PKM')

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
                <h2 class="card-title">EDIT DATA PKM</h2>

              

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a href="{{ route('admin.data.index') }}" class="btn btn-info">Kembali</a><br><br>
                    <form method="post" action="{{ route('admin.data.update', $data->id) }}">
                    @method('patch')
                    @csrf
                        <div class="form-group">
                            <label for="nama">Nama mahasiswa</label>
                            <input type="text" name="nama" id="nama" value="{{ $data->nama  }}" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="nim">Nim</label>
                          <input type="text" name="nim" id="nim" value="{{ $data->nim }}" class="form-control">
                      </div>
                        <label for="judul">Judul PKM</label>
                        <input type="text" name="judul" id="judul" value="{{ $data->judul }}" class="form-control">
                        </div>

                <div class="form-group">
                    <label for="tipe">Tipe PKM</label>
                    <select id="inputStatus" name="tipe" id="tipe" class="form-control custom-select">
                        <option  disabled>Pilih</option>
                        <option {{ $data->tipe == "PKM Bidang Riset Eksakta (PKM-R) atau PKM Bidang Riset Humaniora (PKM-R)" ? "selected" : "" }}>
                        PKM Bidang Riset Eksakta (PKM-R) atau PKM Bidang Riset Humaniora (PKM-R)
                        </option>
                        <option {{ $data->tipe == "PKM Bidang Kewirausahaan (PKM-K)" ? "selected" : "" }}>
                        PKM Bidang Kewirausahaan (PKM-K)
                        </option>
                        <option {{ $data->tipe == "PKM Bidang Pengabdian Kepada Masyarakat (PKM-PM)" ? "selected" : "" }}>
                        PKM Bidang Pengabdian Kepada Masyarakat (PKM-PM)
                        </option>
                        <option {{ $data->tipe == "PKM Bidang Penerapan Iptek (PKM-PI)" ? "selected" : "" }}>
                        PKM Bidang Penerapan Iptek (PKM-PI)
                        </option>
                        <option {{ $data->tipe == "PKM Bidang Karsa Cipta (PKM-KC)" ? "selected" : "" }}>
                        PKM Bidang Karsa Cipta (PKM-KC)
                        </option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="anggota1">Anggota1</label>
                  <select class="selectpicker form-control" name="anggota1" id="anggota1" data-live-search="true">
                      <option>Pilih</option>
                      @foreach ($users as $item)
                        <option value="{{$item->id}}" {{$item->id == $data->anggota1 ? "selected" : ""}}>{{$item->name}}</option>
                      @endforeach
                  </select>
              </div>

               

                <div class="form-group">
                  <label for="anggota2">Anggota 2</label>
                  <select class="selectpicker form-control" name="anggota2" id="anggota2" data-live-search="true">
                      <option selected>Pilih</option>
                      @foreach ($users as $item)
                        <option value="{{$item->id}}" {{$item->id == $data->anggota2 ? "selected" : ""}}>{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="anggota3">Anggota 3</label>
                  <select class="selectpicker form-control" name="anggota3" id="anggota3" data-live-search="true">
                      <option selected>Pilih</option>
                      @foreach ($users as $item)
                        <option value="{{$item->id}}" {{$item->id == $data->anggota3 ? "selected" : ""}}>{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="angkatan">Tahun angkatan</label>
                    <select id="inputStatus" name="angkatan" id="angkatan" class="form-control custom-select">
                        <option selected disabled>Pilih</option>
                        <option {{$data->angkatan == "2018" ? "selected" : ""}}>2018</option>
                        <option  {{$data->angkatan == "2019" ? "selected" : ""}}>2019</option>
                        <option  {{$data->angkatan == "2020" ? "selected" : ""}}>2020</option>
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