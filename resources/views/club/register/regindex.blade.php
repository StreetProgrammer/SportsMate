@include('club.layouts.regheader')
@include('club.layouts.regnavbar')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin: auto;">
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
     <h1>
       Dashboard
       <small>Control panel</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Dashboard</li>
     </ol>
   </section> -->

    <!-- Main content -->
    <section class="content">
    	@include('club.layouts.regmessages')
    	@yield('content')
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    <br><br><br><br>
  </div>
  <!-- /.content-wrapper -->



@include('club.layouts.regfooter')