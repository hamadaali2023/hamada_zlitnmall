@include("account.header")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @yield('contentpage')
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         

          
        @yield('content')

       

      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



    @include("account.footer")

 