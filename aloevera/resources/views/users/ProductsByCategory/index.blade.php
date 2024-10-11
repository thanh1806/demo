@extends('users.master')
@section('content')

<div class="container container-gobal">
    <div class="title">
        <h1>SẢN PHẨM ĐANG BÁN</h1>
    </div>
    <div class="list-menu-items">
        
        @foreach ($products as $key => $value )
            
            @if ($value->active === 0)
            <a href="{{ route('detail', ['id'=>$value->id_new]) }}">
                <div class="item {{$value->fix}} {{$value->fixmobile}}">
                    <div class="item-image">
                        <img src="{{ asset('upload/images/'.$value->images[0]) }}" alt="Hình ảnh sản phẩm">
                    </div>
                    
                    <div class="item-name">
                        <h1>{{$value->name_product}}<br>{{$value->name_product2}}
                        </h1>
                    </div>
                    <div class="item-volume">
                        <h4>mã số: #{{$value->code}} | {{$value->volume}}</h4>
                    </div>
                    <!-- <div class="item-description">
                        <p>{{$value->description_most}}</p>
                    </div> -->
                    <div class="item-price">
                        <h4>{{$value->price}}</h4>
                    </div>
                    <div class="item-btn">
                        <button data-label="more" class="rainbow-hover">
                            <a href="{{ route('detail', ['id'=>$value->id_new]) }}"><span class="sp">Xem thêm</span></a>
                        </button>
                    </div>
                    <div class="attention">
                        <span><b>HẾT HÀNG</b></span>
                    </div>
                </div>
            </a>
            
            @else
           
                <div class="item {{$value->fix}} {{$value->fixmobile}}">
                <a href="{{ route('detail', ['id'=>$value->id_new]) }}">
                    <div class="item-image">
                        @if (count($value->images) !== 0 )
                            
                      
                        <img src="{{ asset('upload/images/'.$value->images[0]) }}" alt="Hình ảnh sản phẩm">
                        @endif
                    </div>
                    </a>
                    
                    <div class="item-name">
                        <h1>{{$value->name_product}}<br>{{$value->name_product2}}
                        </h1>
                    </div>
                    <div class="item-volume">
                        <h4>mã số: #{{$value->code}} | {{$value->volume}}</h4>
                    </div>
                    <!-- <div class="item-description">
                        <p>{{$value->description_most}}</p>
                    </div> -->
                    @if ($value->discount > 0)
                    <div class="item-price2">
                       <h4> <del>{{$value->price}} VND</del>   <a>-{{$value->sale}}%</a> </h4> 
                    </div>

                    <div class="item-discount">
                        <h2>{{$value->discount}} VND</h2>
                    </div>
                    @else 
                    <div class="item-price">
                        <h2>{{$value->price}} VND</h2>
                    </div>
                     @endif 
                    <div class="item-btn">
                        <button data-label="more" class="rainbow-hover">
                            <a href="{{ route('detail', ['id'=>$value->id_new]) }}"><span class="sp">Xem thêm</span></a>
                        </button>
                    </div>
                </div>
            </a>
            @endif
       
        @endforeach
        
      
       
    </div>
    {{$products->links()}}
</div>



@endsection