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
                <h3 class="card-title">Add post</h3>
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
              <form action="{{ Route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label>Select category</label>
                    <select class="form-control" name="category_id">
                      @foreach($categories as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div> -->

                  <div class="form-group">
                    <label>Select sub category</label>
                    <select class="form-control" name="sub_category_id">
                      @foreach($subcategories as $row)
                      <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->category->name }}</option>
                      @endforeach
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                  </div>

                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug">
                  </div>

                   <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" >
                  </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('admin.post.index') }}" class="btn btn-warning">Back</a>
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
