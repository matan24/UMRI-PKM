@extends('layouts.admin')

@section('title', 'Ganti Password | PKM')

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
                <h2 class="card-title">GANTI PASSWORD DENGAN BAIK DAN AMAN !</h2>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form method="post" action="#">
                        @csrf

                         <div class="form-group">
                            <label>Password Lama</label>                        
                            <input name="password"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>                        
                            <input name="pwbaru"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>                        
                            <input name="pwbaru"  class="form-control">
                        </div>

                    <div class="form-group">

                    <button type="submit" class="btn btn-primary">Simpan</button>

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
