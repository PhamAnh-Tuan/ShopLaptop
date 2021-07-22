@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content" style="min-height:1639px">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Product</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Product</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Product</header>
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
                                <button style = "margin-right: 20px" class = "btn btn-danger delete_all" data-url = "http://localhost/ShopLaptop/trang-quan-tri/san-pham/xoa-nhieu" > <i class="fas fa-trash"></i> </button>
                                    <a href="{{ route('product.create') }}" id="addRow" class="btn btn-info">
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
                                            <a>
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
                                                                <th class="center">Ảnh</th>
                                                                <th class="center">Tên</th>
                                                                <th class="center">Tên danh mục</th>
                                                                <th class="center">Bàn phím</th>
                                                                <th class="center">Pin</th>
                                                                <th class="center">Cân nặng</th>
                                                                <th class="center">Số lượng</th>
                                                                <th class="center">Giá</th>
                                                                <th class="center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $stt=1 ?>
                                                            @foreach ($all_product as $key => $product)
                                                                <tr  id="tr_{{$product->prd_id}}}">
                                                                <td> <input type = "checkbox" class = "sub_chk" data-id = "{{$product->prd_id}}"> </td>
                                                                 <td class="center">{{ $stt++ }}</td>
                                                                    <td class="center">
                                                                        <img src="{{asset('public/uploads/product')}}/{{ $product->prd_img }}" alt="" style="width:100px;height:80px">
                                                                    </td>
                                                                    <td class="center">{{ $product->prd_name }}</td>
                                                                    <td class="center">{{ $product->category->cat_name }}</td>
                                                                    <td class="center">{{ $product->prd_keyboard }}</td>
                                                                    <td class="center">{{ $product->prd_battery }}</td>
                                                                    <td class="center">{{ $product->prd_weight }}</td>
                                                                    <td class="center">{{ $product->prd_number }}</td>
                                                                    <td class="center">{{ number_format($product->prd_price,0,'','.')  }}</td>
                                                                    <td class="center">
                                                                        <a href="{{ route('product.edit',['id'=>$product->prd_id]) }}"
                                                                            class="btn btn-tbl-edit btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <a class="btn btn-tbl-delete btn-xs" href="{{ route('product.delete',['id'=>$product->prd_id]) }}"
                                                                            onclick="return confirm('Xác nhận xóa sản phẩm: {{ $product->prd_name }}');">
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
