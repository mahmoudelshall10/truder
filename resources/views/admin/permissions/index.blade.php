@extends('admin.layouts.app')
@section('page-title') Index Permission @endsection
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
              <li class="breadcrumb-item active">Permissions</li>
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
              <h3 class="card-title">Permissions Data Table 
                @can('admin.permissions.create')
                  <a href="{{route('admin.permissions.create')}}" class="btn btn-primary">Create</a>
                @endcan
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                <tr>
                  <td>{{ $permission->name }}</td>
                    <td>
                        @can('admin.permissions.edit')
                        <a href="{{route('admin.permissions.edit',$permission->id)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        @can('admin.permissions.destroy')
                            <a href="#deModal{{$permission->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>
                            <div class="modal fade" id="deModal{{$permission->id}}" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation
                                                    <a class="close" data-dismiss="modal" href="#">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this record?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST"  action="{{route('admin.permissions.destroy',$permission->id)}}">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
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
  </div>
  <!-- /.content-wrapper -->
@endsection