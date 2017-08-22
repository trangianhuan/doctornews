<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MANAGERMENT</li>
        <li class="treeview {{ set_active(['admin/department', 'admin/department/create']) }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>{{ trans('admin\menu.department') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="{{ set_active(['admin/department']) }}"><a href="{{ route('department.index') }}"><i class="fa fa-circle-o"></i> {{ trans('admin\menu.department_list') }}</a></li>
            <li class="{{ set_active(['admin/department/create']) }}"><a href="{{action('Admin\DepartmentsController@create')}}"><i class="fa fa-circle-o"></i>{{ trans('admin\menu.department_add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ set_active(['admin/service', 'admin/service/create']) }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>{{ trans('admin\menu.service') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ set_active(['admin/service']) }}"><a href="{{action('Admin\ServicesController@index')}}"><i class="fa fa-circle-o"></i> {{ trans('admin\menu.service_list') }}</a></li>
            <li class="{{ set_active(['admin/service/create']) }}"><a href="{{action('Admin\ServicesController@create')}}"><i class="fa fa-circle-o"></i> {{ trans('admin\menu.service_add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ set_active(['admin/article', 'admin/article/create']) }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>{{ trans('admin\menu.article') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ set_active(['admin/article']) }}"><a href="{{action('Admin\ArticlesController@index')}}"><i class="fa fa-circle-o"></i> {{ trans('admin\menu.article_list') }}</a></li>
            <li class="{{ set_active(['admin/article/create']) }}"><a href="{{action('Admin\ArticlesController@create')}}"><i class="fa fa-circle-o"></i> {{ trans('admin\menu.article_add') }}</a></li>
          </ul>
        </li>

        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
       <!--  <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>