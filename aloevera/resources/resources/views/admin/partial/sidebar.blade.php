   <!--begin::Sidebar-->
   <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a  class="brand-link"> <!--begin::Brand Image--> <img src="{{ asset('assets/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Admin</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
              
            
             
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                        <p>
                            Quản lí sản phẩm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('admin.product' )}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Sản phẩm</p>
                            </a> </li>
                    </ul>
                </li>
               
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Danh mục sản phẩm
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"> <a href="{{ route('admin.categories')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                            <p>Danh sách phân loại</p>
                        </a> </li>
                  
                </ul>
            </li>
          
         
               
                     
                    </a> </li>
                <li class="nav-item"> <a href="./docs/faq.html" class="nav-link"> <i class="nav-icon bi bi-gear"></i>
                        <p>Setting</p>
                    </a> </li>
               
             
                
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->