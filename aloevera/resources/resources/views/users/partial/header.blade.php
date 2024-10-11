 {{-- header --}}
 <header>
    
    <div class="global-header ">
        <div class="header-second ">
            <div class="logo">
               <a href="/"><img src="{{ asset('/images/logo5.png') }}" alt="logo"></a>
            </div>
            <div class="header-second_right">
                <div id="toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="nav">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="dropdown">
                        <span class="submenu">Sản phẩm <i class="fa-solid fa-caret-down"></i></span> 
                        <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton1">
                            @foreach ($cate as $value)
                            <a href="{{ route('products.by.category', ['id'=>$value->id_new]) }}"><li>{{$value->name}}</li></a>
                            @endforeach
                            
                           
                        </ul>
                    </li>
                    <li><a href="/">Tin tức</a></li>   
                    <li><a href="/chinh-sach">Chính sách </a></li>
                </ul>
            </div>
        </div>
        <div class="header-third container-gobal">
           
        </div>
    </div>
    <div class="global-heade">
    <div class="header-second ">
            
    </div>
</header>
{{-- end header --}}