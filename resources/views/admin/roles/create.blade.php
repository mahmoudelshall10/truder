@extends('admin.layouts.app')
@section('page-title') Create Role @endsection
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
              @can('admin.roles.index')
                <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Role</a></li>
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
                <h3 class="card-title">Role Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Enter Name" value="{{ old('name') }}">
                  </div>

                    <div class="form-row">
                        @foreach($permission as $value)
                            <div class="form-group col-md-4">     
                                <label class="custom-control custom-checkbox m-0">
                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'custom-control-input')) }}
                                    <span class="custom-control-label">{{ $value->name }}</span>
                                </label>
                            </div>
                        @endforeach
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



@endsection

