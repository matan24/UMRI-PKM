@extends('layouts.admin')

@section('title', 'Update Info | PKM')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            @if (session('status'))
            <div class="alert alert-warning">
              {{ session('status')}}
          </div>
             @endif
          </div>
         
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>UPDATE INFORMASI</b></h3>
              </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <a href="{{ route('admin.info.info') }}" class="btn btn-primary">Kembali</a><br><br>
                <table id="example2" class="table table-success table-striped">
                  <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Image</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $info as $item )
                    <tr>
                      <td>{{ $item->judul }}</td>
                      <td>{!! $item->isi !!}</td>
                      <td>{{ $item->image }}</td>

                      <td  class="d-flex">                        
                        <form action="{{ route('admin.info.delete', $item->id) }}" method="post">
                          @method('delete')
                          @csrf 
                          <button type="submit" class="btn btn-danger mr-6"><i class="bi bi-trash"></i></button>
                        </form>
      
                      </td>
                    </tr>
                    @endforeach
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
