@extends('admin.masterAdmin')
@section('content')

{{-- script import editor 5 --}}
<script type="importmap">
    {
        "imports": {
            "ckeditor5": " {{ asset('assets/vendor/ckeditor5.js') }} "
           
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        Heading,
       
        List,
        
   
       
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            
            plugins: [ Essentials, Paragraph, Bold, Italic, Font, Heading ,List ],
            toolbar: [
                'undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|','bulletedList', 'numberedList',
            ],
            
        
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
{{--  --}}
    <div class="card card-success card-outline mb-4"> <!--begin::Header-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Sửa đổi sản phẩm</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Danh sách sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Sửa đổi sản phẩm
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
                                Hãy nhập thông tin sản phẩm bạn muốn trưng bày</div>
                        </div> <!--end::Col--> <!--begin::Col-->
                        <div class="col-md-12"> <!--begin::Quick Example-->
                            <!--begin::Input Group-->
                            <form action="{{ route('admin.product.edit.post') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                               
                                <div class="card card-success card-outline mb-4"> <!--begin::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="validationCustom04">Loại sản phẩm: </span>
                                            <select class="form-select" name="category" id="category" required="">
                                                <option selected  value="{{$selected_cate['selected_id']}}">{{$selected_cate['selected_name']}}</option>
                                                @foreach ($category as $cate)
                                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-feedback">
                                                Vui lòng chọn loại sản phẩm.
                                            </div>
                                        </div>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text" id="basic-addon1">Tên sản phẩm: </span> 
                                                <input type="text" class="form-control"
                                                placeholder="Tên sản phẩm" name="name_product" value="{{$data->name_product}}"> 
                                        </div>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text" id="price">Giá sản phẩm: </span> 
                                            <input type="text" class="form-control" placeholder="500.000" name="price" value="{{$data->price}}"> 
                                        </div>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text" id="price">Giá giảm </span> 
                                            <input type="text" class="form-control" placeholder="200.000" name="discount" value="{{$data->discount}}"> 
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Mổ tả nổi bật:</span>
                                            <textarea  class="form-control" aria-label="Description" name="description_most"> {{$data->description_most}}</textarea>
                                        </div>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text">Mổ tả sản phẩm:</span>
                                           
                                            {{-- <textarea id="editor" class="form-control" aria-label="Description" name="description"></textarea> --}}
                                        </div>
                                            <textarea id="editor" class="form-control" aria-label="Description" name="description">{{$data->description}}</textarea>

                                        {{-- <div id="editor">
                                            <p>Hello from CKEditor 5!</p>
                                        </div> --}}
                                        <br>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text">Hình ảnh 512x512:</span>
                                            <input type="file" name="files[]" id="file_upload"
                                                class="form-control" multiple>  </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$data->newid}}">
                                    <ul class="display_img">
                                    @foreach ($data->images as $key => $item)
                                        <?php $id_item = explode('.',$item) ?>
                                        <li class="img_item img_{{$id_item[0]}}" id="img_{{$id_item[0]}}">
                                            <img src="{{ asset('upload/images/'.$item) }}" class="img-fluid" alt="...">
                                            <input type="hidden" name="images_uploaded[]" value="{{$item}}">

                                            <div class="delete_img " data-id="{{$data->newid}}"  data-name="img_{{$id_item[0]}}">
                                                <i class="bi bi-x-lg"></i>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                     <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Sửa đổi</button>
                                        <button type="cancel" onclick="history.back()" class="btn btn btn-danger">Trở lại</button>
                                    </div> <!--end::Footer-->
                                </div> <!--end::Input Group-->
                               
                            </form>
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
            
        </main>
    @endsection
