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
              @can('admin.pages.index')
                <li class="breadcrumb-item"><a href="{{route('admin.pages.index')}}">Page</a></li>
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
              <h3 class="card-title">{{ $page->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-6">
                        <p><strong>Created By:</strong> {{ $page->createdBy->name }}</p>
                        <p><strong>URL:</strong> <a href="{{ $page->url }}">{{ $page->name }}</a></p>
                      </div>
                      <div class="col-lg-6">
                       <p><strong>Slug:</strong> {{ $page->slug }}</p>
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