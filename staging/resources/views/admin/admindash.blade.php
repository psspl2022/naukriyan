@php
    $user_id=Auth::user()->id;
    use App\Http\Controllers\RoleController;
    $row=RoleController::getRow($user_id);
    if($row=="")
    {
      echo '<section style="padding: 5rem;text-align: center;"><div style="font-size: 1.5rem;margin-bottom: 1rem;"><b>You dont have permission to access! Please contact to super admin</b></div> </section>';
      exit;
    }
    $m = RoleController::getLowestPrice();
    $role = RoleController::getRole($user_id);
    $role_str=$role['roles_assigned'];
    $role_arr=explode(",",$role_str)
          
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Naukriyan | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
   <link href="{{ asset('css/app-admin.css') }}" rel="stylesheet">
    
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
      <auto-logout></auto-logout>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            </li>
            @else            
           <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                 </form>
                 </div>
                 </li>
                @endguest
        </ul>

      </li>
    </ul>
     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/admin" class="brand-link elevation-4">
      <img src="{{asset('assets/admin/default/logo1.png')}}"
           alt="Logo"
           class="brand-image elevation-3"
           style="opacity: .8; width: 85%;">
     </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-top: 5px;">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

   
    @foreach($m as $plaza)
    
    @php
    $s = RoleController::getSubMenu($plaza['menu']);
    $size = sizeof($s)
    @endphp

    @if($size==1)
    @foreach($s as $sb1)
    @if(in_array($sb1['id'], $role_arr))
    <li class="nav-item has-treeview">
        <router-link to="{{ $sb1['link'] }}" class="nav-link">
            <i class="nav-icon fas {{ $sb1['menu_icon'] }}"></i>
              <p>
                {{ $plaza['menu'] }} 
              </p>
          </router-link>
           
      </li>
      @endif
      @endforeach
    
    @else

    <li class="nav-item has-treeview">
       @php
    $icon = RoleController::getIcon($plaza['menu'])
    @endphp
    
        <a href="#" class="nav-link">
          <i class="nav-icon fas {{$icon['menu_icon']}}"></i>
            <p>
              {{ $plaza['menu'] }}
           <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
            
            <ul class="nav nav-treeview">
             @foreach($s as $sb)
             @if(in_array($sb['id'], $role_arr))
              <li class="nav-item">
                <router-link to="{{ $sb['link'] }}"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  {{ $sb['submenu'] }}
                  </p>
                </router-link>
              </li>
              @endif
              @endforeach
            </ul>
          </li>
               
             </ul>
          </li>

    @endif



          

    @endforeach    

    @if(Auth::user()->job_title=="SuperAdmin")
    <li class="nav-item has-treeview">
      
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
            <p>
              Roles
           <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
            
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <router-link to="/add-adminuser"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Add Admin User
                  </p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/add-adminuser-role"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Assign Role
                  </p>
                </router-link>
              </li>

                <li class="nav-item">
                    <router-link to="/adminuser-role-list"  class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Admin Assigned Role List
                        </p>
                    </router-link>
                </li>
              
            </ul>
          </li>
               
             </ul>
          </li>  
    @endif
         
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <admin-main></admin-main>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Naukriyan</b>
    </div>
    <strong>Copyright &copy; 2017-2021 </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{ asset('js/app.js') }}"></script>



</body>
</html>
