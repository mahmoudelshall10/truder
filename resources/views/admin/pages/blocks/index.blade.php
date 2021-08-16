@extends('admin.layouts.app')
@section('page-title') Blocks Of Page: {{ $blocks->name }} @endsection
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
              <li class="breadcrumb-item active">Pages</li>
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
              <h3 class="card-title">Data Table Blocks Of Page - {{ $blocks->name }} </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blocks->manyblocks as $block)
                <tr>
                  <td>{{ $block->block->name }}</td>
                  <td>
                      @can('admin.pages.blocks.show')
                        <a href="{{route('admin.pages.blocks.show',$block->page_id)}}"><i class="fas fa-eye"></i></a>
                      @endcan
                      @can('admin.pages.blocks.edit')
                        <a href="{{route('admin.pages.blocks.edit',$block->page_id)}}"><i class="fas fa-pencil-alt"></i></a>
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