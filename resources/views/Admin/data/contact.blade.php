@extends('layouts.admin')

@section('title', 'Data Kontak Mhs | PKM')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>DATA KONTAK PESAN MAHASISWA</h4>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-success table-striped">
                  <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan/Keluhan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ( $contact as $item )
                    <tr>
                      <td>{{ $item->nim }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->email }}</td>     
                      <td>{{ $item->pesan }}</td>
                      <td  class="d-flex">
                        <a href="#" class="btn btn-dark"><i class="bi bi-check2-square"></i></a>                      
                      </td>                
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