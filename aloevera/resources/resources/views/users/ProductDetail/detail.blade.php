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
                @foreach ($product->images as $key => $img)
               
                <div class="imglist-item ">
                    <img src="{{ asset('upload/images/'.$img) }}" alt="Hình ảnh sản phẩm">
                </div>
                

                @endforeach
            </div>
        </div>
        {{-- right --}}
        
        <div class="product-info_iteminfo">
            <div class="item-name">
                @if($product->active === 0)
                    <h4>{{$product->name_product}} <span style="color: red">(Đang đợi nhập hàng...)</span></h4>
                @else
                <h1>{{$product->name_product}} </h1>
                @endif
                
            </div>
            <div class="item-description_most">
                <p>{{$product->description_most}}</p>
            </div>
            <div class="item-price">
                <h2>Giá: {{$product->price}}</h2>
            </div>
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