  <header class="main-header">
    <!-- Logo -->
    <a href="{{ aurl('') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sport Mate</b> Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      @include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('design/AdminLTE') }}/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ admin()->user()->name }}</p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="{!! trans('admin.navSearch') !!}">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{!! trans('admin.mainNavigation') !!}</li>

        <li class=" treeview {{ makeActiveLinkActive()[0] }}">
          <a href="#" style="{{ makeActiveLinkActive()[2] }}">
            <i class="fa fa-dashboard"></i> <span>{!! trans('admin.adminpanel') !!}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style=" {{ makeActiveLinkActive()[1] }}">
            <li class="active"><a href="{{ aurl() }}"><i class="fa fa-circle-o"></i> {!! trans('admin.home') !!}</a></li>
            <li class="active"><a href="{{ aurl('sports') }}"><i class="fa fa-circle-o"></i> {!! trans('admin.sports') !!}</a></li>

            <!--<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
          </ul>
        </li>
        <!------->
        <li class="treeview {{ makeActiveLinkActive(['clubs','admins', 'players'])[0] }}">
          <a href="#" style="{{ makeActiveLinkActive(['clubs','admins', 'players'])[2] }}">
            <i class="fa fa-users"></i>
            <span>{!! trans('admin.users') !!}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ makeActiveLinkActive(['admins', 'clubs', 'players'])[1] }}">
            @if (admin()->user()->type == 1)
              <li>
              <a href="{{ aurl('admins') }}">
                <i class="fa fa-circle-o"></i> {!! trans('admin.admins') !!}
              </a>
            </li>
            @endif
            
            <li>
              <a href="{{ aurl('clubs') }}">
                <i class="fa fa-circle-o"></i> {!! trans('admin.clubs') !!}
              </a>
            </li>
            <li>
              <a href="{{ aurl('players') }}">
                <i class="fa fa-circle-o"></i> {!! trans('admin.players') !!}
              </a>
            </li>

          </ul>
        </li>
        <!------>
        
        <!------>
       <li class="treeview {{ makeActiveLinkActive(['events', 'challenges'])[0] }}">
          <a href="#" style="{{ makeActiveLinkActive(['events', 'challenges'])[2] }}">
            <i class="fa fa-cubes"></i> <span>{!! trans('admin.mainelements') !!}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ makeActiveLinkActive(['events', 'challenges'])[1] }}">
            <li class="{{ makeActiveLinkActive(['events'])[0] }}">
              <a href="{{ aurl('events') }}">
                <i class="fa fa-cube"></i> {!! trans('admin.events') !!}
              </a>
            </li>
             <li class="{{ makeActiveLinkActive(['challenges'])[0] }}">
              <a href="{{ aurl('challenges') }}">
                <i class="fa fa-cube"></i> {!! trans('admin.challenges') !!}
              </a>
            </li>
            <li class="{{ makeActiveLinkActive(['reservations'])[0] }}">
              <a href="{{ aurl('reservations') }}">
                <i class="fa fa-cube"></i> {!! trans('admin.eventReservation') !!}
              </a>
            </li>
          </ul>
        </li>
        <!------->
        <!------>
        <!------->
        <li class="treeview {{ makeActiveLinkActive(['settings','countries', 'governorates'])[0] }}">
          <a href="#" style="{{ makeActiveLinkActive(['settings','countries', 'governorates'])[2] }}">
            <i class="fa fa-cogs"></i>
            <span>{!! trans('admin.settings') !!}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ makeActiveLinkActive(['settings', 'countries', 'governorates'])[1] }}">
            <li class="{{ makeActiveLinkActive(['settings'])[0] }}">
              <a href="{{ aurl('settings') }}">
                <i class="fa fa-cog"></i> {!! trans('admin.siteSettings') !!}
              </a>
            </li>
            <li class="{{ makeActiveLinkActive(['countries'])[0] }}">
              <a href="{{ aurl('countries') }}">
                <i class="fa fa-flag"></i> {!! trans('admin.countries') !!}
              </a>
            </li>
            <li>
              <a href="{{ aurl('countries/create') }}">
                <i class="fa fa-plus"></i> {!! trans('admin.addCountry') !!}
              </a>
            </li>
            <li>
              <a href="{{ aurl('governorates') }}">
                <i class="fa fa-flag"></i> {!! trans('admin.governoratesControl') !!}
              </a>
            </li>
            <li>
              <a href="{{ aurl('areas') }}">
                <i class="fa fa-flag"></i> {!! trans('admin.areasControl') !!}
              </a>
            </li>
           </ul>
        </li>
        <!------>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
