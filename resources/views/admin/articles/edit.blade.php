@extends('admin.layouts.app')
@section('page-title') Edit Articale @endsection
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
              @can('admin.articles.index')
                <li class="breadcrumb-item"><a href="{{route('admin.articles.index')}}">Article</a></li>
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
                <h3 class="card-title">Article Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputTitle1" placeholder="Enter Title" value="{{ $article->title }}">
                  </div>

                  
                  <div class="form-group">
                    <label for="categoryId">Category</label>
                    <select name="category_id" id="categoryId" class="form-control">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id ===  $article->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    <hr>
                    <img src="{{ url('/') . '/' .  $article->image }}" alt="{{ $article->title }}" style="width: 100px;height:100px">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputPost">Post</label>
                      <textarea name="post" id="exampleInputPost" cols="30" rows="10" class="form-control textarea">{{ $article->post }}</textarea>
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