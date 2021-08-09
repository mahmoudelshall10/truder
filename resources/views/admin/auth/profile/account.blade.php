@extends('admin.layouts.app')
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
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

@include('flash_messages')
    <section class="content">
    @if(request('a') == 'general-info')
        @include('admin.auth.profile.general-info')
    @endif

    @if(request('a') == 'change-password')
        @include('admin.auth.profile.change-password')
    @endif

    @if(request('a') == 'change-image')
        @include('admin.auth.profile.change-image')
    @endif
    </section>
</div>
@endsection