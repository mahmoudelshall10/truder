@extends('admin.layouts.app')
@section('page-title') Create Page @endsection
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
                <li class="breadcrumb-item"><a href="{{route('admin.pages.index')}}">Page</a></li>
              @endcan
              <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">Page Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter Name" value="{{ old('name') }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputSlug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="exampleInputSlug" placeholder="Enter Slug" value="{{ old('slug') }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputURL">URL</label>
                    <input type="text" class="form-control" name="url" id="exampleInputURL" placeholder="Enter URL" value="{{ old('url') }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputURL">Page Blocks</label>
                    <div class="form-row">
                      @foreach($blocks as $value)
                      <div class="form-group col-md-4">     
                        <label class="custom-control custom-checkbox m-0">
                          {{ Form::checkbox('blocks[]', $value->id, false, array('class' => 'custom-control-input')) }}
                          <span class="custom-control-label">{{ $value->name }}</span>
                        </label>
                      </div>
                      @endforeach
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