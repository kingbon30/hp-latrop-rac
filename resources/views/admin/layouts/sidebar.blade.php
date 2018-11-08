  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('asset-admin/dist/img/avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Philip Lazarus</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::is('admin') ? 'active' : '' }}" ><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::is('admin/vehicles') ? 'active' : '' }}" ><a href="{{ route('vehicles.index')}}"><i class="fa fa-car"></i> <span>Vehicles</span></a></li>
        <li class="treeview {{ Request::is('admin/makes','admin/models','admin/features') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           {{--  <li><a href=""><i class="fa fa-circle-o"></i> Vehicle Types</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Body Types</a></li> --}}
            <li class="{{ Request::is('admin/makes') ? 'active' : '' }}" ><a href="{{ route('makes.index')}}"><i class="fa fa-angle-double-right"></i> Makes</a></li>
            <li class="{{ Request::is('admin/models') ? 'active' : '' }}" ><a href="{{ route('models.index')}}"><i class="fa fa-angle-double-right"></i> Models</a></li>
            <li class="{{ Request::is('admin/features') ? 'active' : '' }}"><a href="{{ route('features.index')}}"><i class="fa fa-angle-double-right"></i> Features</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/blogs/blog-categories', 'admin/blogs/blog-posts') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/blogs/blog-posts') ? 'active' : '' }}" ><a href="{{ route('blog-posts.index')}}"><i class="fa fa-angle-double-right"></i> Post</a></li>
            <li class="{{ Request::is('admin/blogs/blog-categories') ? 'active' : '' }}" ><a href="{{ route('blog-categories.index')}}"><i class="fa fa-angle-double-right"></i> Categories</a></li>
          </ul>
        </li>
        <li><a href="/" target="_blank"><i class="fa fa-link text-red"></i> <span>Visit Website</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>