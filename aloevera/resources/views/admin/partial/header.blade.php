  <!--begin::Header-->
  <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>

        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> 
            <li class="nav-item"> 
                <a class="nav-link"  href="{{ route('home') }}"> 
                    <span class="">Trang Chủ</span>
                 </a>
               
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="{{ asset('assets/img/avatar2.png')}}" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">ADMIN</span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-header text-bg-primary"> <img src="{{ asset('assets/img/avatar2.png') }} " class="rounded-circle shadow" alt="User Image">
                        <p>
                             Tuấn Thành - Web Developer
                            <small>Member since Nov. 2024</small>
                        </p>
                    </li> <!--end::User Image--> <!--begin::Menu Body-->
              
                    <li class="user-footer"> <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Sign out</a> </li> <!--end::Menu Footer-->
                </ul>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> 