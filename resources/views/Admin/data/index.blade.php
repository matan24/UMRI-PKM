@extends('layouts.admin')

@section('title', 'Data Judul | PKM')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>DATA PROGRAM KREATIF MAHASISWA</h4>
          </div> 
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
                <h3 class="card-title"><b>Tambah Mahasiswa</b></h3>
              </div>
              <div class="card-body">
                  {{-- pakai fungsi enctype utk upload file excel ke laragon/db --}}
                <form action="{{ route('admin.data.import') }}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="form-group">
                    <input name="users" type="file">
                  </div>
                  <div class="form-group"><button class="btn btn-primary">Import</button></div>
                </form>
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
                    <th>Aksi</th>
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
                    <td>
                      @if ($item->status == 1)
                      <div class="badge badge-success">
                        Aktif  
                      </div>
                      @else
                      <div class="badge badge-warning">
                        Aktif  
                      </div>
                    @endif
                    </td>
                      <td  class="d-flex">
                        <a href="{{ route('admin.data.edit', $item->id) }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>                      
                        
                        <form action="{{ route('admin.data.delete', $item->id) }}" method="post">
                          @method('delete')
                          @csrf 
                          <button type="submit" class="btn btn-danger mr-6"><i class="bi bi-trash"></i></button>
                        </form>
      

                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td class="text-center" colspan="6">Data Kosong...</td>
                    </tr>
                    @endforelse
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