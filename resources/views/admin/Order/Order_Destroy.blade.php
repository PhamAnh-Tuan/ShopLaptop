@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content" style="min-height:1639px">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    {{-- <div class="page-title">All Order</div> --}}
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Order</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Order</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Đơn hàng đã hủy</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body p-0" id="pjax-container">
                                        <div id="url-sort" data-urlsort="http://localhost/s-cart/public/sc_admin/order?"
                                            style="display: none;"></div>
                                        <div class="table-responsive">
                                            <table class="table table-hover box-body text-wrap table-bordered" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên khách</th>
                                                        <th>Địa chỉ</th>
                                                        <th>SDT</th>
                                                        <th>Ghi chú</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Trạng thái đơn hàng</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $stt = 1; ?>
                                                    @foreach ($all_order as $key => $value)
                                                        <tr>
                                                            <td>{{ $stt++ }}</td>
                                                            <td>{{ $value->user_name }}</td>
                                                            <td>{{ $value->user_address }}</td>
                                                            <td>{{ $value->user_phone }}</td>
                                                            <td>{{ $value->ord_note }}</td>
                                                            <td>{{ date('d-m-y', strtotime($value->ord_date_created)) }}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-danger">{{ $value->ord_status }}
                                                                </span>
                                                            </td>
                                                            <td>{{ number_format($value->ord_total, 0, '', '.') }}</td>
                                                            <td class="center">
                                                                <a href="{{ route('order.restore',['id'=>$value->ord_id]) }}">
                                                                    <i class="fas fa-trash-restore"></i>
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
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
