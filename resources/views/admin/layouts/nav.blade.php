  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      @can('admin.generalInfo')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admin/profile?a=general-info')}}" class="nav-link">My Account</a>
        </li>
      @endcan
      @can('admin.changePassword')
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('admin/profile?a=change-password')}}" class="nav-link">Change Password</a>
      </li>
      @endcan
      @can('admin.changeImage')
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{url('admin/profile?a=change-image')}}" class="nav-link">Change Image</a>
          </li>
      @endcan
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('admin.logout') }}"onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="nav-link">{{ __('Logout') }}</a>
        </li>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
          @csrf
        </form>
    </ul>

    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> --}}

  </nav>
  <!-- /.navbar -->