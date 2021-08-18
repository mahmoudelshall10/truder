  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{url('/').'/'.settings('logo')}}" alt="{{ settings('name') }} Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ settings('name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->photo)  
            <img src="{{url('/').'/'.Auth::user()->photo}}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
            @else
            <img src="https://via.placeholder.com/150" class="img-circle elevation-2" alt="{{ Auth::user()->name }}" >
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can(['admin.dashboards.index'])
            <li class="nav-item">
              <a href="{{ route('admin.dashboards.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
          @endcan
          @can(['admin.settings.index'])
            <li class="nav-item">
              <a href="{{ route('admin.settings.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                <p>
                  Settings
                </p>
              </a>
            </li>
          @endcan

   

          @canany(['admin.categories.index','admin.categories.create'])
            <li class="nav-item has-treeview {{ request()->routeIs('admin.categories.*')  ? 'menu-open' : ''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                  Categories
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can(['admin.categories.index'])
                  <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.index')  ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Index</p>
                    </a>
                  </li>
                @endcan
                @can(['admin.categories.create'])
                  <li class="nav-item">
                    <a href="{{ route('admin.categories.create') }}" class="nav-link {{ request()->routeIs('admin.categories.create')  ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan
              </ul>
            </li>
          @endcanany

          @canany(['admin.permissions.index','admin.permissions.create'])
            <li class="nav-item has-treeview {{ request()->routeIs('admin.permissions.*')  ? 'menu-open' : ''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ban"></i>
                <p>
                  Permissions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can(['admin.permissions.index'])
                  <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ request()->routeIs('admin.permissions.index')  ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Index</p>
                    </a>
                  </li>
                @endcan
                @can(['admin.permissions.create'])
                <li class="nav-item">
                  <a href="{{ route('admin.permissions.create') }}" class="nav-link {{ request()->routeIs('admin.permissions.create')  ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
          @endcanany
         
          @canany(['admin.roles.index','admin.roles.create'])
            <li class="nav-item has-treeview {{ request()->routeIs('admin.roles.*')  ? 'menu-open' : ''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Roles
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can(['admin.roles.index'])
                <li class="nav-item">
                  <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.index')  ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Index</p>
                  </a>
                </li>
                @endcan
                @can(['admin.roles.create'])
                  <li class="nav-item">
                    <a href="{{ route('admin.roles.create') }}" class="nav-link {{ request()->routeIs('admin.roles.create')  ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan
              </ul>
            </li>
          @endcanany

          @canany(['admin.pages.index','admin.pages.create'])
            <li class="nav-item has-treeview {{ request()->routeIs('admin.pages.*')  ? 'menu-open' : ''}}">
              <a href="#" class="nav-link">
                <i class="fas fa-newspaper"></i>
                <p> 
                  Pages
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can(['admin.pages.index'])
                  <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.index')  ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Index</p>
                    </a>
                  </li>
                @endcan
                @can(['admin.pages.create'])
                <li class="nav-item">
                  <a href="{{ route('admin.pages.create') }}" class="nav-link {{ request()->routeIs('admin.pages.create')  ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
          @endcanany

          @canany(['admin.blocks.index','admin.blocks.create'])
          <li class="nav-item has-treeview {{ request()->routeIs('admin.blocks.*')  ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-code"></i>
              <p>
                Blocks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can(['admin.blocks.index'])
                <li class="nav-item">
                  <a href="{{ route('admin.blocks.index') }}" class="nav-link {{ request()->routeIs('admin.blocks.index')  ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Index</p>
                  </a>
                </li>
              @endcan
              @can(['admin.blocks.create'])
              <li class="nav-item">
                <a href="{{ route('admin.blocks.create') }}" class="nav-link {{ request()->routeIs('admin.blocks.create')  ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        @endcanany


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>