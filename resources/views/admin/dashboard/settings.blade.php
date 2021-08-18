@extends('admin.layouts.app')
@section('page-title') Site Settings @endsection
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
                <h3 class="card-title">Settings Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{settings('name')}}"/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{settings('description')}}"/>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{settings('phone')}}"/>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Author" value="{{settings('author')}}"/>
                    </div>

                    <hr>

                    <div class="form-row">
                        
                        <div class="form-group col-6">
                            <label for="logo">Logo
                                <img src="{{url('/').'/'.settings('logo')}}" 
                                class="img-fluid pr-2" alt="log" style="width: 50px; height:50px">
                            </label>
                            <input type="file" name="logo" id="logo">
                            
                        </div>

                        <hr>
                        
                        <div class="form-group col-6">
                            <label for="icon">Icon
                                <img src="{{url('/').'/'.settings('icon')}}" class="img-fluid pr-2" alt="icon" style="width: 50px; height:50px">
                            </label>
                            <input type="file" name="icon" id="icon">
                        </div>
                        
                    </div>


                    <div class="form-group">    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
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