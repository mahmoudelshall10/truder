@extends('admin.layouts.app')
@section('page-title') Edit Permission @endsection
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
              @can('admin.permissions.index')
                <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Permission</a></li>
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
                <h3 class="card-title">Permission Edit</h3>
                <br>
                <h6 class="card-subtitle text-muted">ex: <strong>permissions.index</strong> - <strong>permissions.create</strong> - <strong>permissions.show</strong> - 
										<strong>permissions.edit</strong> - <strong>permissions.destroy</strong> 
									</h6>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" action="{{ route('admin.permissions.update',$permission->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Enter Name" value="{{ $permission->name }}">
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