@extends('admin.layouts.app')
@section('page-title') Index Block @endsection
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
              <li class="breadcrumb-item active">Blocks</li>
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
              <h3 class="card-title">Blocks Data Table 
                  <a href="{{route('admin.blocks.create')}}" class="btn btn-primary">Create</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  @can('admin.blocks.active')
                  <th>Active</th>
                  @endcan
                  <th>Created By</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blocks as $block)
                <tr>
                  <td>{{ $block->name }}</td>
                  @can('admin.blocks.active')
                    <td>
                      <form action="{{route('admin.blocks.active',$block->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">{{ $block->active == 1 ? 'Active' : 'Desactive'}}</button>
                      </form>
                    </td>
                  @endcan
                  <td>{{ $block->createdBy->name }}</td>
                    <td>
                        @can('admin.blocks.show')
                            <a href="{{route('admin.blocks.show',$block->id)}}"><i class="fas fa-eye"></i></a>
                        @endcan

                        @can('admin.blocks.edit')
                            <a href="{{route('admin.blocks.edit',$block->id)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        @can('admin.blocks.destroy')
                            <a href="#deModal{{$block->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>
                            <div class="modal fade" id="deModal{{$block->id}}" role="dialog">
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
                                            <form method="POST"  action="{{route('admin.blocks.destroy',$block->id)}}">
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