<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- link google font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    {{-- Link css --}}
    
    <link href="{{ asset('css/all.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    
    <title>Trang chủ</title>
    {{-- SEO --}}
    <meta name="keywords" content="">
    <meta name="description" content="">
   
</head>
<body>

code header

<div class="tuan">
    <div class="thanh">
        <div class="thanh0">              
            <a><h1>WELCOME</h1></a>
        </div>
        <div class="thanh1">
            <ul>
                <a href="https://www.facebook.com/clonenttdz" title="bấm thử đi cậu"><h2>About</h2></a>
                <a href="https://www.facebook.com/clonenttdz" title="bấm thử đi cậu"><h2>Skills</h2></a>
                <a href="https://www.facebook.com/clonenttdz" title="bấm thử đi cậu"><h2>Experience</h2></a>
                <a href="https://www.facebook.com/clonenttdz" title="bấm thử đi cậu"><h2>Service</h2></a>
            </ul>
        </div>

    </div>
</div>
<!-- end code header -->
<!-- start code main -->
 <div class="maintuan">
    <div class="main1">
        <div class="ten1">
            <a> <b> Tuấn </b><b> Thành </b><img width="30" height="30" src="{{ asset('/images/tich.png') }}" alt="" loading="lazy"> </a>
        </div>
        <div class="ten2">
            <a> UX/UI DESIGNER & WEB DEVELOPER</a>
        </div>
        <ul>
        <a href="https://www.facebook.com/clonenttdz" title="facebook" class="ten3">
        <img width="50" height="50" src="{{ asset('/images/fb123.png') }}" alt="" loading="lazy">
        </a>
        <a href="mailto:nguyentuanthanhblog.com?subject="subject text title="gmail" class="ten4">
        <img width="50" height="50" src="{{ asset('/images/gmails.png') }}" alt="" loading="lazy">
        </a>
        <a href="https://zalo.me/0399984576" title="zalo" class="ten5">
        <img width="50" height="50" src="{{ asset('/images/zalo.png') }}" alt="" loading="lazy">
        </a>
        <a href="tel:0399984576" title="số điện thoại" class="ten6">
        <img width="52" height="52" src="{{ asset('/images/call.png') }}" alt="" loading="lazy">
        </a>
        </ul>
    </div>
    <div class="main2">
            <div class="ten4">
                <a><b>Thiết kế website</b></a><br>
                <a><b>làm một lần dùng cả đời</b></a>
             <!-- <img class="box-shadow" src="{{ asset('/images/acc2.png') }}" alt="ảnh tuii"> -->
            </div>
            <div class="ten5">
                <ul>
                    <li>nâng tầm chuyên nghiệp</li>
                    <li>giúp tiếp cận khách hàng</li>
                    <li>tăng độ uy tín thương hiệu</li>
                    <li>dễ dàng quản lý sản phẩm</li>
                </ul>
                </div>
    </div>
</div>

   </body>
</html>
