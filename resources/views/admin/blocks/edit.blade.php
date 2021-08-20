@extends('admin.layouts.app')
@section('page-title') Edit Block @endsection
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
              @can('admin.pages.index')
                <li class="breadcrumb-item"><a href="{{route('admin.blocks.index')}}">Block</a></li>
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
                <h3 class="card-title">Block Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.blocks.update',$block->id) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter Name" value="{{ $block->name }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputLayout">Layout</label>
                    <input type="text" name="layout" class="form-control" value="{{ $block->layout }}" placeholder="Enter Layout">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>

                    <br>
                    
                    <div class="row no-gutters mt-1">
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <img src="{{url('/').'/'.$block->photo}}" class="img-fluid pr-2" alt="{{$block->name}}">
                        </div>
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