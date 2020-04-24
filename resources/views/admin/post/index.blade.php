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
              <h3 class="card-title">Manage Posts</h3>
              <div class="float-right">
                <a href="{{ route('admin.post.create') }}" class="btn btn-xs btn-primary">Add Post</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Sub-Category</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php($i = 1)

                  
                @foreach($posts as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $row->subcategory->category->name }}</td>
                   <td>{{ $row->subcategory->name }}</td>
                    <td>{{ $row->title }}</td>
                    <td>
                      <img src="{{ asset('frontend/image/6648443251108E15.png') }}" style="width:70px;">
                    </td>
                  <td>
                      <a href="" class="btn btn-xs btn-primary">View</a>
                      <a href="" class="btn btn-xs btn-info">Edit</a>
                      <a href="" class="btn btn-xs btn-info">Published</a>
                      <form id="logout-form" action="" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</button>     
                      </form>   
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