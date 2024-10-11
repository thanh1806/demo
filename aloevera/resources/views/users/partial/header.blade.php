 {{-- header --}}
 <header>
    
    <div class="global-header ">
        <div class="header-second ">
            <div class="header-one">
            <div class="logo">
               <a href="/"><img src="{{ asset('/images/logo5.png') }}" alt="logo"></a>
            </div>
            </div>
            <div class="header-second_right">
                <div id="toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="nav">
                    <li><a href="/"><b>Trang chủ</b></a></li>
                    <li class="dropdown">
                        <span class="submenu"><b>Sản phẩm </b><i class="fa-solid fa-caret-down"></i></span> 
                        <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton1">
                            @foreach ($cate as $value)
                            <a href="{{ route('products.by.category', ['id'=>$value->id_new]) }}"><li><b>{{$value->name}}</b></li></a>
                            @endforeach
                            
                           
                        </ul>
                    </li>
                    <li><a href="/tin-tuc"><b>Blog sức khoẻ</b> </a></li>   
                    <li><a href="/chinh-sach"><b>Chính sách </b></a></li>
            
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