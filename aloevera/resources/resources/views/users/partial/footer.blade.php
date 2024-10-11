{{-- footer --}}
<footer>
    <div class="global-footer">
    <div class="contact">
                <div class="facebook">
                    <a href="https://web.facebook.com/profile.php?id=100089563795856">
                        <img src="{{ asset('/images/fb123.png') }}" alt="facebook">
                    </a>
                </div>
    </div>
        <div class="footer-first">
            <div class="logo">
                <a href="/"><img src="{{ asset('/images/logo5.png') }}" alt="logo"></a>
            </div>
            <div class="infomation">
                <p><i class="fa-solid fa-location-dot"></i> Bình Thạnh, Hồ Chí Minh</p>
                <p><i class="fa-solid fa-phone"></i> 035 874 2101</p>
                <p><i class="fa-solid fa-envelope"></i> aloeverahcm@gmail.com</p>
            </div>
            <div class="store-active">
                <p>Giờ hoạt động: 6AM - 22PM</p>
            </div>
        </div>
        <div class="footer-second">
                <p><i class="3"></i> <a href="/"> Trang chủ </a></p>
                <p><i class="4"></i> Tin tức</p>
                <p><i class="5"></i><a href="/chinh-sach">Chính sách</a></p>
                @if(Auth::Check())
        <div class="loginow">
            <a href="{{ route('admin.product') }}" class="admin-btn"><img src="{{ asset('/images/admins.png') }}" alt="admin"></a>
        </div>
        @else
        <div class="loginow">
            <button class="login-btn">ADMIN </button>
        </div>
        @endif
               <p>copyright © 2024 aloeveravn.com.<a href="https://www.facebook.com/cloneNTTdz">  Web Design by Tuấn Thành </a></p>
        </div>
        </div>
    
</footer>

  <!-- làm admin
  chỉnh header
  giảm giá
  chính sách
  tin tức

         -->