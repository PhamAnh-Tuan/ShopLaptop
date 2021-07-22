@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content" style="min-height:1639px">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Category Product</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Category Product</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Category Product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Category Product</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                 <button style = "margin-right: 20px" class = "btn btn-danger delete_all" data-url = "http://localhost/ShopLaptop/trang-quan-tri/danh-muc-sp/xoa-nhieu" > <i class="fas fa-trash"></i> </button>
                                    <a href="{{ route('category_product.create') }}" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group pull-right">
                                    <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                                        data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <div id="example4_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="dataTables_scroll">
                                            <div class="dataTables_scrollHead"
                                                style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                <div class="dataTables_scrollHeadInner"
                                                    style="box-sizing: content-box; width: 994px; padding-right: 0px;">
                                                    <table class="table" id="example">
                                                        <thead>
                                                            <tr>
                                                             <th width="50px"> <input type="checkbox" id="master"> </th>
                                                                <th class="center">STT</th>
                                                                <th class="center">Tên danh mục</th>
                                                                <th class="center">Tên thương hiệu</th>
                                                                <th class="center">Mô tả</th>
                                                                <th class="center">Trạng thái</th>
                                                                <th class="center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $stt=1 ?>
                                                            @foreach ($all_category_product as $key)
                                                                <tr class="gradeX odd" role="row" id="tr_{{$key->cat_id}}}">
                                                                <td> <input type = "checkbox" class = "sub_chk" data-id = "{{$key->cat_id}}"> </td>
                                                                    <td class="center">{{ $stt++ }}</td>
                                                                    <td class="center">{{ $key->cat_name }}</td>
                                                                    <td class="center">{{ $key->brands->brd_name }}</td>
                                                                    <td class="center">{{ $key->cat_description }}</td>
                                                                    <td class="center">
                                                                        <?php if ($key->cat_status == 0) {
                                                                        echo '<i class="far fa-eye-slash" style="color:red"></i>';
                                                                        } else {
                                                                        echo '<i class="far fa-eye" style="color:blue"></i>';
                                                                        } ?>
                                                                    </td>
                                                                    <td class="center">
                                                                        <a href="{{ route('category.edit', ['id' => $key->cat_id]) }}"
                                                                            class="btn btn-tbl-edit btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <a href="{{ route('category.delete', ['id' => $key->cat_id]) }}"
                                                                            onclick="return confirm('Xác nhận xóa sản phẩm: {{ $key->cat_name }}');"
                                                                            class="btn btn-tbl-delete btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('tokenn')
 <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('delete-many')
<script src="js/delete/delete-many.js"></script>
@endsection
