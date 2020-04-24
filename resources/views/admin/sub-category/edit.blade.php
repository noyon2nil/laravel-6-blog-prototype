@extends('layouts.master')

@section('title', 'show/Category')


@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Sub Category</h3>
              </div>
              <!-- /.card-header -->

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif


              <!-- form start -->
              <form action="{{ url('update/sub-category/'.$subCategoriy->id) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Select category</label>
                    <select class="form-control" name="category_id">
                      @foreach($categories as $row)
                      <option <?php if($row->id ==$subCategoriy->category_id ){echo "selected";}?>  value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Sub category Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $subCategoriy->name }}" ">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('sub.category') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
