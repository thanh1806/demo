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
                            <h3 class="mb-0">Thêm sản phẩm</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Danh sách sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Thêm sản phẩm
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
                            <form action="{{ route('admin.product.add.post') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                               
                                <div class="card card-success card-outline mb-4"> <!--begin::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="validationCustom04">Loại sản phẩm: </span>
                                            <select class="form-select" name="category" id="category" required="">
                                                <option selected="" disabled="" value="">Chọn loại sản phẩm...
                                                </option>
                                                @foreach ($data as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-feedback">
                                                Vui lòng chọn loại sản phẩm.
                                            </div>
                                        </div>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="name_product2">mã
                                                 </span> <input type="text" class="form-control"
                                                placeholder="241" name="code"> </div>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">Tên
                                                sản phẩm: </span> <input type="text" class="form-control"
                                                placeholder="Tên sản phẩm" name="name_product"> </div>
                                                <div class="input-group mb-3"> <span class="input-group-text" id="name_product2">tên sản phẩm 2
                                                 </span> <input type="text" class="form-control"
                                                placeholder="tên dưới" name="name_product2"> </div>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="volume">quy cách đóng gói
                                                 </span> <input type="text" class="form-control"
                                                placeholder="100ml" name="volume"> </div>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="price">Giá sản
                                                phẩm: </span> <input type="text" class="form-control"
                                                placeholder="nếu có" name="price"> </div>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="discount">Giá
                                                giảm: </span> <input type="text" class="form-control"
                                                placeholder="450.000" name="discount"> </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Mổ tả nổi bật:</span>
                                            <textarea  class="form-control" aria-label="Description" name="description_most"></textarea>
                                        </div>
                                        <div class="input-group mb-3"> <span class="input-group-text">Mổ tả sản phẩm:
                                            </span>
                                           
                                            {{-- <textarea id="editor" class="form-control" aria-label="Description" name="description"></textarea> --}}
                                        </div>
                                            <textarea id="editor" class="form-control" aria-label="Description" name="description"></textarea>

                                        {{-- <div id="editor">
                                            <p>Hello from CKEditor 5!</p>
                                        </div> --}}
                                        <br>
                                        <div class="input-group mb-3"> 
                                            <span class="input-group-text">Hình ảnh 512x512:</span>
                                            <input type="file" name="files[]" id="file_upload"
                                                class="form-control" multiple>
                                        </div>
                                        <div class="display_img" >
                                        </div>
                                       

                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit"  class="btn btn-success">Thêm</button>
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
