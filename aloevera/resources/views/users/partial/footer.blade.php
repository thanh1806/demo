{{-- footer --}}
<footer>
    <div class="global-footer">

        <div class="footer-first">
            <div class="logo">
                <a href="/"><img src="{{ asset('/images/logo5.png') }}" alt="logo"></a>
            </div>
            <div class="infomation">
                <p><i class="fa-solid fa-location-dot"></i> <b>Bình Thạnh, Hồ Chí Minh</b></p>
                <p><i class="fa-solid fa-phone"></i> <b>035 874 2101 </b> </p>
                <p><i class="fa-solid fa-envelope"></i> <b>aloeverahcm@gmail.com </b> </p>
            </div>
            <div class="store-active">
                <p><b>Giờ hoạt động: 6AM - 22PM</b> </p>
            </div>
        </div>
        <div class="footer-second">
                <p><i class="3"></i> <a href="/"> <b> Trang chủ </b></a></p>
                <p><i class="4"></i><a href="/tin-tuc"><b>Blog sức khoẻ</b> </a></p>
                <p><i class="5"></i><a href="/chinh-sach"><b>Chính sách</b> </a></p>
               <p><b>copyright © 2024 aloeveravn.com.<b><a href="/tuan-thanh"> Web Design by Tuấn Thành </a></p>  
               @if(Auth::Check())
        <div class="loginow">
            <a href="{{ route('admin.product') }}" class="admin-btn"> ADMIN</a>
        </div>
        @else
        <div class="loginow">
            <button class="login-btn"><img src="{{ asset('/images/admin9.png') }}" alt="login"> </button>
        </div>
        @endif
        </div>
        <div class="footer-right">
                   <p>liên hệ với chúng tôi</p>

        <div class="zalopay">
           
        </div>
    </div>
    
</footer>

<a href="https://www.facebook.com/profile.php?id=100089563795856" title="contact" class="devvn_animation_zoom">
    <img width="72" height="72" src="{{ asset('/images/fb123.png') }}" alt="" loading="lazy">

</a>

  <!-- làm admin
  chỉnh header
  giảm giá
  chính sách
  tin tức

         -->