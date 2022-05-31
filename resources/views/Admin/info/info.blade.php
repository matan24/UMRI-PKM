@extends('layouts.admin')

@section('title', 'Informasi | PKM')

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
                <h2 class="card-title">INFORMASI HALAMAN HOME</h2>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
              <a href="{{ route('admin.info.show') }}" class="btn btn-info">Detail Informasi</a>
              <br><br>
                <div class="form-group">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.info.info') }}">
                        @csrf
                        <div class="form-group">
                            <label>Judul Informasi</label>                        
                            <input name="judul"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Informasi</label>                        
                            <textarea name="isi" id="editor" cols="30" rows="10"></textarea>
                        </div>

                      <label for="image">Input Foto</label>
                        <div class="form-group">
                          <input name="image" type="file">
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

@push('ckeditor')
<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

</script>
@endpush