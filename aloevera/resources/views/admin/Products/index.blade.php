@extends('admin.masterAdmin')
@section('content')
<!--begin::App Main-->
<main class="app-main">
<!--begin::App Content Header-->
<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0"></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Sản phẩm
                    </li>
                </ol>
                {{$product_data->links()}}
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div>

<!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm</h3>
                        <a type="button" href="{{ route('admin.product.add') }}"  class="btn btn-primary float-end">Thêm mới</a>
                    </div> <!-- /.card-header -->
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 100px">Ảnh</th>
                                    <th style="">Phân loại</th>
                                    <th style="">mã sản phẩm</th>
                                    <th style="">Tên</th>
                                    <th style="">tên phụ</th>
                                    <th style="">đóng gói</th>
                                    <th>Mô tả nổi bật</th>
                                    <th>Mô tả</th>
                                    <th>Giá bán</th>
                                    <th style="width: 100px"> giá giảm</th>
                                    <th style="width: 90px">Tình trạng</th>
                                    <th>Ngày tạo</th>
                                    <th style="width: 135px">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_data as $value)
                                <tr class="align-middle">
                                    <td data-label ="Số Thứ Tự">{{$value->stt}}</td>
                                    {{-- Xử lý hiển thị hình ảnh(1 ảnh đầu) --}}
                                   
                                    
                                    {{--  --}}
                                    <td >
                                     @if (count($value->images) !== 0 )
                                        <img class="img-fluid img-thumbnail" src="{{ asset('upload/images/'.$value->images[0]) }}" alt="Ảnh sản phẩm"> 
                                    @endif
                                    </td>
                                    <td data-label ="Loại sản phẩm">{{$value->category->name}}</td>
                                    <td >{{$value->code}}</td>
                                    <td >{{$value->name_product}}</td>
                                    <td >{{$value->name_product2}}</td>
                                    <td >{{$value->volume}}</td>
                                    <td >{{$value->description_most}}</td>
                                    <td class="mota">{{$value->description}}</td>
                                    <td data-label ="Giá sản phẩm">{{$value->price}}</td>
                                    <td data-label ="giá giảm">{{$value->discount}}</td>
                                    @if ($value->active === 1)
                                    <td data-label ="Tình trạng sản phẩm" style="color: #11d922;">
                                        
                                        <label class="switch">
                                        <input type="checkbox" class="active_checkbox" data-route="{{ route('admin.update.active') }}" data-flag="true" data-id="{{$value->id_new}}" checked>
                                        <span class="slider"></span>
                                      </label></td>
                                    
                                    @else
                                    <td data-label ="Tình trạng sản phẩm" style="color: #e81526;">
                                        
                                        <label class="switch">
                                            <input type="checkbox"  class="active_checkbox" data-route="{{ route('admin.update.active') }}" data-flag="false" data-id="{{$value->id_new}}">
                                            <span class="slider"></span>
                                          </label>
                                    </td>
                                    
                                    @endif
                                    <td data-label ="Ngày thêm sản phẩm">{{$value->created_at}}</td>
                                    
                                    <td data-label ="Hành động" class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.product.edit', ['id'=>$value->id_new]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Chỉnh sửa
                                        </a>
                                        <a class="btn btn-danger btn-sm btn_event"  data-id="{{$value->id_new}}" data-route="{{ route('admin.product.delete') }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Xóa
                                        </a>
                                    </td>
                                  
                                </tr>
                                @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                    {{$product_data->links()}}
                    {{-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">»</a> </li>
                        </ul>
                    </div> --}}
                </div> <!-- /.card -->
              
            </div> <!-- /.col -->
         
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div>
<!--end::App Content-->
</main>
<!--end::App Main-->

@endsection