@extends('layouts.user')

@section('title', 'List Data | PKM')

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
                <h3 class="card-title btn btn-primary"><b>DATA SELURUH PROGRAM KREATIF MAHASISWA</b></h3>
              </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-success table-striped">
                  <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Ketua PKM</th>
                    <th>Judul PKM</th>
                    <th>Tipe PKM</th>
                    <th>Anggota1</th>
                    <th>Anggota2</th>
                    <th>Anggota3</th>
                    <th>Angkatan</th>
                    <th>Status</th>
                    <th>Valid</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ( $usulan as $item )
                    <tr>
                      <td>{{ $item->nim }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->judul }}</td>
                      <td>{{ $item->tipe }}</td>
                      <td>{{ $anggota1=\App\Models\User::find($item->anggota1)->name }}</td>
                      <td>{{ $anggota1=\App\Models\User::find($item->anggota2)->name }}</td>
                      <td>{{ $anggota1=\App\Models\User::find($item->anggota3)->name }}</td>
                      <td>{{ $item->angkatan }}</td>
                     
                      @if ($item->status == 1)
                      <td>
                      <div class="badge badge-success">
                        Aktif  
                      </div>
                      </td>
                      @else
                      <td>
                      <div class="badge badge-warning">
                        Pending  
                      </div>
                      </td>
                      @endif
                    
                      <td  class="d-flex">
                        <a href="#" class="btn btn-dark"><i class="bi bi-check2-square"></i></a>                      
                      </td>
                    </tr>
                      @empty
                    <tr>
                      <td class="text-center" colspan="6">Data Kosong...</td>
                    </tr>
                    @endforelse
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
@push('tablescript')
<script src="{{ asset('admin3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush