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
                        Phân loại
                    </li>
                </ol>
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
                        <h3 class="card-title">Danh sách phân loại</h3>
                        <a type="button" href="{{ route('admin.categories.add') }}"  class="btn btn-primary float-end">Thêm mới</a>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                          
                                
                         
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                   
                                    <th>Tên loại</th>
                                 
                                    <th style="width: 116px">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr class="align-middle">
                                    <td>{{$item->stt}}</td>
                                    <td>{{$item->name}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.categories.edit', ['id'=>$item->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm btn_event" data-id="{{$item->id_new}}" data-route="{{ route('admin.categories.delete') }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
              
                                </tr>
                                @endforeach
                               
                             
                               
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                    {{$data->links()}}
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