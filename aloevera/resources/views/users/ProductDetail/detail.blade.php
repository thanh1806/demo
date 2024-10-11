@extends('users.master')
@section('content')
<div class="container container-gobal">
    <div class="product-info">
        {{-- left --}}
        <div class="product-info_img">
            <div class="product-info_imgbig">
                @if (count($product->images) !== 0 )
                <img src="{{ asset('upload/images/'.$product->images[0]) }}" alt="Hình ảnh sản phẩm">
                             
  
                @else
                <img src="" alt="Hình ảnh sản phẩm">
                @endif
            </div>
            <div class="product-info_imglist">
               
        
                    <div class="item">
                        <ul id="content-slider" class="content-slider">
                            @foreach ($product->images as $key => $img)
                            <li class="imglist-item ">
                                <img src="{{ asset('upload/images/'.$img) }}" alt="Hình ảnh sản phẩm">
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
            
              	
               
                @if ($product->active === 0)
                <div class="attention">
                        <span><b>HẾT HÀNG</b></span>
                    </div>
                @endif
             
            </div>
            
        </div>
        {{-- right --}}
        
        <div class="product-info_iteminfo">

            <div class="item-name"> 
                <a>{{$product->name_product}} </a>
            </div>
            <div class="item-name"> 
                <a>{{$product->name_product2}} </a>
            </div>
            <div class="item-code">
                    <p>#{{$product->code}}</p>
            </div>
            <div class="item-description_most">
                <p>{{$product->description_most}}</p>
            </div>
            <div class="item-volume">
                <p>Quy cách đóng gói: {{$product->volume}}</p>
            </div>
            
                @if ($product->discount > 0)
                
                    <div class="item-price2">
                        <h4><del>{{$product->price}} VND    </del> <a>  -{{$product->sale}}% </a></h4>
                    </div>
                    <div class="item-discount">
                        <h2><b>Giá: {{$product->discount}} VND</b></h2>
                    </div>
                    @else
                    <div class="item-price">
                        <h2>Giá: {{$product->price}} VND</h2>
                    </div>
                    @endif
            <div class="item-contact">
            
            </div>
        </div>
    </div>
    {{-- description --}}
    <div class="product-description">
         <div class="title">
            <h2>MÔ TẢ SẢN PHẨM</h2>
         </div>
         <div class="description_item">
            
            <p>
                {{$product->description}}
            </p>
            
         </div>
    </div>
</div>
@endsection
