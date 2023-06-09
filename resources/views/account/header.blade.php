<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Flot Charts</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('account/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('account/plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::asset('account/plugins/iCheck/all.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('account/plugins/select2/select2.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('account/dist/css/skins/_all-skins.min.css') }}">
   {{-- Javascript --}}
  <link rel="stylesheet" href="{{ URL::asset('account/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"> 
  {{-- Make Font RTL --}}
  <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome-rtl.min.css') }}"> 
  {{-- Admin RTL --}}
  <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE-rtl.min.css') }}">

  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet"> 
  {{-- Bootstrap Rtl --}}
  <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap-rtl.min.css') }}">
   {{-- Admin RTL --}}
  <link rel="stylesheet" href="{{ asset('dashboard/css/rtl.css') }}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
    <a href="{{URL('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          زلتين</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <b>أدمن </b>زلتين مول</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            {{-- <li style="display: none;" class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- start message -->
                      <a href="#">
                        <div class="pull-left">

                          <img src="  {{asset('account/dist\img\user1-128x128.jpg')}}" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small>
                            <i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">


                          <img src="url({{ URL::asset('account\dist\img/user3-128x128.jpeg') }})" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          AdminLTE Design Team
                          <small>
                            <i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Developers
                          <small>
                            <i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Sales Department
                          <small>
                            <i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Reviewers
                          <small>
                            <i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">See All Messages</a>
                </li>
              </ul>
            </li> --}}
            <!-- Notifications: style can be found in dropdown.less -->
            {{-- <li style="display: none;" class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all</a>
                </li>
              </ul>
            </li> --}}
            <!-- Tasks: style can be found in dropdown.less -->
            {{-- <li style="display: none;" class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li> --}}
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('/Upload/'.Auth::user()->url.'')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{asset('Upload/'.Auth::user()->url.'')}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}} 
                    <small>عضو  منذ {{Auth::user()->created_at}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                {{-- <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">المتابعين</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">المبيعات</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">الأصدقاء</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li> --}}
                <!-- Menu Footer-->
                <li class="user-footer">
                  {{-- <div class="pull-left">
                    <a href="{{url('/Admin/profile')}}" class="btn btn-default btn-flat">الملف الشخصى </a>
                  </div> --}}
                  <div class="pull-right">
                    <a href="{{url('/AdminLogOut')}}" class="btn btn-default btn-flat"> تسجيل خروج</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            {{-- <li>
              <a href="#" data-toggle="control-sidebar">
                <i class="fa fa-gears"></i>
              </a>
            </li> --}}
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('/Upload/'.Auth::user()->url.'')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#">
              <i class="fa fa-circle text-success"></i> نشط</a>
          </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li style="font-size:20px" class="header">القائمة </li>

          {{-- show Categories list for Admin --}}
          <li class="treeview">
            <a href="/Categories">
              <i class="fa fa-pie-chart"></i>
              <span>التصنيفات </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
              <a href="{{url('/Admin/Categories')}}">
                <i class="fas fa-angle-right"></i> عرض التصنيفات</a>
              </li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-city"></i>
              <span>المدن </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
              <a href="{{url('/Admin/Cites')}}">
                <i class="fas fa-angle-right"></i> عرض المدن </a>
              </li>

            </ul>
          </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>المحلات </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                <a href="{{url('/Admin/shops')}}">
                  <i class="fas fa-angle-right"></i> عرض المحلات </a>
                </li>
  
              </ul>
            </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i>
              <span>المنتجات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{url('/Admin/products')}}">
                  <i class="fas fa-angle-right"></i> عرض المنتجات </a>
              </li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>المستخدمين</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{url('/Admin/user')}}">
                  <i class="fas fa-angle-right"></i> عرض المستخدمين </a>
              </li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fas fa-user-cog"></i>
              <span>الصلحيات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{url('/Role')}}">
                  <i class="fas fa-angle-right"></i> عرض الصلحيات </a>
              </li>

            </ul>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>