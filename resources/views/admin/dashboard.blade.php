@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sản phẩm</span>
                            <span class="info-box-number">{{ $data['product'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-orange">
                        <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Đơn hàng mới</span>
                            <span
                                class="info-box-number">{{ $data['order_new'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-purple">
                        <span class="info-box-icon push-bottom"><i class="fab fa-pied-piper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Thương hiệu</span>
                            <span class="info-box-number">{{ $data['brand'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon push-bottom"><i class="fas fa-tree"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Danh mục</span>
                            <span class="info-box-number">{{ $data['category'] }} </span>
                        </div>
                    </div>
                </div>
                 <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Nhà cung cấp</span>
                            <span class="info-box-number">{{ $data['supplier'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon push-bottom"><i class="far fa-chart-bar"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tháng này</span>
                            <span class="info-box-number">{{ number_format($total_now['total'], 0, ' ', '.') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng doanh thu</span>
                            <span class="info-box-number">{{ number_format($total['total'], 0, ' ', '.') }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end widget -->
        <!-- chart start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Thống kê lọc theo khoảng ngày</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body no-padding height-9">
                        <form autocomplete="off">
                            @csrf
                            <div class="row text-center">

                                <div class="col-sm-3 col-6">
                                    <h4 class="margin-0">Từ ngày: </h4>
                                    <p class="text-muted"> <input type="text" id="datepicker"></p>
                                    <input type="button" value="Lọc kết quả" id="btn-dashboard-filter">
                                </div>
                                <div class="col-sm-3 col-6">
                                    <h4 class="margin-0">Đến ngày: </h4>
                                    <p class="text-muted"><input type="text" id="datepicker2"></p>
                                </div>
                                <div class="col-sm-2 col-6">
                                    <h4 class="margin-0">Lọc theo: </h4>
                                    <p class="text-muted">
                                        <select class="dashboard-filter form-control">
                                            <option>--Chọn--</option>
                                            <option value="7ngay">7 ngày qua</option>
                                            <option value="thangtruoc">Tháng trước</option>
                                            <option value="thangnay">Tháng này</option>
                                            <option value="365ngayqua">365 ngày qua</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div id="myfirstchart" style="height:250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>Đơn hàng chưa xác thực</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table display product-overview mb-30" id="support_table5">
                                    <thead>
                                        <tr>
                                            <th>Tên khách</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Ghi chú</th>
                                            {{-- <th>Edit</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($not_comfirm as $value => $key)
                                            <tr>
                                                <td>{{ $key->user_name }}</td>
                                                <td>{{ $key->user_address }}</td>
                                                <td>{{ $key->user_phone }}</td>
                                                <td>{{ $key->ord_date_created }}</td>
                                                <td>
                                                    <span class="label label-sm label-success">{{ $key->ord_status }}</span>
                                                </td>
                                                <td>{{ number_format($key->ord_total,0,' ','.') }}</td>
                                                <td>{{ $key->ord_note }}</td>
                                                {{-- <td>
                                                    <a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </button>
                                                </td> --}}
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
        <!-- end Payment Details -->
    </div>
@endsection
@section('java1')

@endsection
