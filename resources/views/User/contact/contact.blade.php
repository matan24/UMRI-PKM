@extends('layouts.user')

@section('title', 'Contact Us | PKM')

@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h5><strong>Lokasi Universitas Muhammadiyah Riau</strong></h5>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6586816668428!2d101.43500421475339!3d0.5125444996260652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aead9af954b9%3A0x5cbd18b673591d0d!2sUniversitas%20Muhammadiyah%20Riau!5e0!3m2!1sid!2sid!4v1636641405805!5m2!1sid!2sid" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <form method="post" action="{{ route('user.contact.store') }}">
                @csrf
              <label for="nim">Nim</label>
              <input type="text" name="nim" id="nim" class="form-control" />
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" id="nama" class="form-control" />
            </div>
            <div class="form-group">
              <label for="email">Email Umri</label>
              <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <label for="pesan">Pesan/Keluhan</label>
              <textarea type="text" name="pesan" id="pesan" class="form-control" rows="4"></textarea>
            </div>

            <div class="row">
              <div class="col-md-10">
                 @if (session('status'))
                <div class="alert alert-warning">
                  {{ session('status')}}
              </div>
              @endif
              
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Kirim Pesan</button> 
            </div>
          </form>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection