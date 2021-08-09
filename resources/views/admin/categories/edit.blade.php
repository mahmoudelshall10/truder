@extends('admin.layouts.app')
@section('page-title') Edit Category @endsection
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              @can('admin.dashboards.index')
                <li class="breadcrumb-item"><a href="{{route('admin.dashboards.index')}}">Home</a></li>
              @endcan
              @can('admin.categories.index')
                <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Category</a></li>
              @endcan
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @include('flash_messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Enter Name" value="{{ $category->name }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection