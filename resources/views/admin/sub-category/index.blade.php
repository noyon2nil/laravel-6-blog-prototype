@extends('layouts.master')

@section('title', 'Category')
@push('style')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Sub-Category</h3>
              <div class="float-right">
                <a href="{{ url('add/sub-category') }}" class="btn btn-xs btn-primary">Add sub-category</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Sub category Name</th>
                  <th>category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($subCategories as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->category->name }}</td>
                  <td>
                  		<a href="{{ url('show/sub-category/'.$row->id) }}" class="btn btn-xs btn-primary">View</a>
                  		<a href="{{ url('edit/sub-category/'.$row->id) }}" class="btn btn-xs btn-info">Edit</a>
                  		<a href="{{ url('delete/sub-category/'.$row->id) }}" class="btn btn-xs btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                  @endforeach           
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('script')
	<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush