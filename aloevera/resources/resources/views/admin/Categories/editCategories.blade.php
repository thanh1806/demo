@extends('admin.masterAdmin')
@section('content')
    <div class="card card-success card-outline mb-4"> <!--begin::Header-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Sửa đổi danh mục sản phẩm</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Danh sách phân loại</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Sửa đổi danh mục
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row g-4"> <!--begin::Col-->
                        <div class="col-12">
                            <div class="callout callout-info">
                                Để quản lí sản phẩm dễ dàng bạn cần phân chia theo các loại: ví dụ như mặt hàng iphone13
                                được nằm trong danh mục điện thoại, tai nghe được nằm trong danh mục phụ kiện điện thoại...
                            </div>
                        </div> <!--end::Col--> <!--begin::Col-->
                        <div class="col-md-12"> <!--begin::Quick Example-->
                          
                           
                         
                           
                            <form method="POST" action="{{ route('admin.categories.edit.post') }}">
                               
                                @csrf
                               
                                <!--begin::Input Group-->
                                <div class="card card-success card-outline mb-4"> <!--begin::Header-->
                                    <!--begin::Body-->

                                    <div class="card-body">

                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text" id="basic-addon1">
                                                Tên phân loại: 
                                            </span> 
                                           
                                            <input 
                                                type="text" name="name" class="form-control"
                                                placeholder="Tên phân loại" 
                                                 value="{{$data->name}}" > 
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                        </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button  class="btn btn-success">Xác nhận</button>
                                        <button onclick="history.back()"  class="btn btn btn-danger">Trở lại</button>
                                    </div> <!--end::Footer-->
                               
                                </div> <!--end::Input Group-->
                               
                            </form>
                          
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main>
    @endsection
