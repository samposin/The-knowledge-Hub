
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{!! asset('public/admin-theme/dist/img/AdminLTELogo.png') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{!! asset('public/images/users/'. auth()->user()->thumbnail) !!}" class="img-circle elevation-2" alt="{{auth()->user()->name }}'s Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.dashboard' ? 'active' : '')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{ (Route::currentRouteName() === 'admin.users.create' || Route::currentRouteName() === 'admin.users.index' ? 'menu-is-opening menu-open' : '') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.users.create')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.users.create' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.users.index' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Route::currentRouteName() === 'admin.roles.create' || Route::currentRouteName() === 'admin.roles.index' ? 'menu-is-opening menu-open' : '') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.roles.create')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.roles.create' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.roles.index')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.roles.index' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Route::currentRouteName() === 'admin.permissions.create' || Route::currentRouteName() === 'admin.permissions.index' ? 'menu-is-opening menu-open' : '') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Permissions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.permissions.create')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.permissions.create' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.permissions.index')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.permissions.index' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Route::currentRouteName() === 'admin.products.create' || Route::currentRouteName() === 'admin.products.index' ? 'menu-is-opening menu-open' : '') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-toolbox"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.products.create')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.products.create' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.products.index')}}" class="nav-link {{ (Route::currentRouteName() === 'admin.products.index' ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>