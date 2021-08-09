@extends('admin.layouts.app')
@section('page-title') Index comment @endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboards.index')}}">Home</a></li>
              <li class="breadcrumb-item active">comments</li>
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
              <h3 class="card-title">Comments Data Table 
                  @can('admin.comments.create') 
                    <a href="{{route('admin.comments.create')}}" class="btn btn-primary">Create</a>
                  @endcan
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Body</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                <tr>
                  <td>{{ $comment->body }}</td>
                    <td>
                        @can('admin.comments.destroy')
                            <a href="#deModal{{$comment->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>
                            <div class="modal fade" id="deModal{{$comment->id}}" role="dialog">
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
                                            <form method="POST"  action="{{route('admin.comments.destroy',$comment->id)}}">
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