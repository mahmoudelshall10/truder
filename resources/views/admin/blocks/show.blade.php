@extends('admin.layouts.app')
@section('page-title') Show Page @endsection
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
              @can('admin.blocks.index')
                <li class="breadcrumb-item"><a href="{{route('admin.blocks.index')}}">Block</a></li>
              @endcan
              <li class="breadcrumb-item active">Show</li>
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
              <h3 class="card-title">{{ $block->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-6">
                        <p><strong>Created By:</strong> {{ $block->createdBy->name }}</p>
                      </div>
                      <div class="col-lg-6">
                       <p><strong>Photo:</strong></p>
                       <img src="{{url('/').'/'.$block->photo}}" class="img-fluid pr-2" alt="{{$block->name}}">
                   </div>
               </div>
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