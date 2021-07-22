@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content" style="min-height:1639px">
        <div class="content-wrapper" style="min-height: 119px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tạo đơn hàng
                            </h1>
                            <div class="more_info"></div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="http://localhost/s-cart/public/sc_admin"><i
                                            class="fa fa-home fa-1x"></i> Trang chủ</a></li>
                                <li class="breadcrumb-item active">Tạo đơn hàng</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header with-border">
                                    <h2 class="card-title">Tạo mới một đơn hàng</h2>
                                    <div class="card-tools">
                                        <div class="btn-group float-right" style="margin-right: 5px">
                                            <a href="http://localhost/s-cart/public/sc_admin/order"
                                                class="btn  btn-flat btn-default" title="List"><i
                                                    class="fa fa-list"></i><span class="hidden-xs"> Trở lại danh
                                                    sách</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('order.create') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row ">
                                            <label for="customer_id" class="col-sm-2 asterisk col-form-label">Tên khách
                                                hàng</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="first_name" name="user_name" value=""
                                                        class="form-control first_name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label for="address2" class="col-sm-2 col-form-label">Địa chỉ</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="address2" name="user_address" value=""
                                                        class="form-control address2" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row  ">
                                            <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-phone fa-fw"></i></span>
                                                    </div>
                                                    <input style="width: 150px" type="text" id="phone" name="user_phone"
                                                        value="" class="form-control phone" placeholder="Input Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="phone" class="col-sm-2 col-form-label">Tổng tiền</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-money-check-alt"></i></span>
                                                    </div>
                                                    <input style="width: 150px" type="number" id="phone" name="ord_total"
                                                        value="" class="form-control phone" placeholder="Nhập tổng tiền">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="comment" class="col-sm-2 col-form-label">Ghi chú</label>
                                            <div class="col-sm-8">
                                                <textarea name="ord_note" class="form-control comment" rows="5"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="payment_method" class="col-sm-2 col-form-label">Thanh toán</label>
                                            <div class="col-sm-8">
                                                <select class="form-control payment_method " style="width: 100%;"
                                                    name="payment_method">
                                                    <option value="Chưa thanh toán">Chưa thanh toán</option>
                                                    <option value="Đã thanh toán">Đã thanh toán</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row  ">
                                            <label for="shipping_method" class="col-sm-2 col-form-label">Vận chuyển</label>
                                            <div class="col-sm-8">
                                                <select class="form-control shipping_method " style="width: 100%;"
                                                    name="shipping_method">
                                                    <option value="Chưa vận chuyển">Chưa vận chuyển</option>
                                                    <option value="Đã vận chuyển">Đã vận chuyển</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row  ">
                                            <label for="status" class="col-sm-2 col-form-label">Trạng thái</label>
                                            <div class="col-sm-8">
                                                <select class="form-control status " style="width: 100%;"
                                                    name="status_method">
                                                    <option value="Chưa xác thực">Chưa xác thực</option>
                                                    <option value="Đã xác thực">Đã xác thực</option>
                                                    <option value="Đã giao">Đã giao</option>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>

                                    </div>
                                    <!-- /.card-body -->
                                    <table class="table table-hover box-body text-wrap table-bordered" id="myTable">
                                        <tr id="details" style="display:none">
                                            <td> <select onchange="selectProduct()"
                                                    class="add_id form-control select2 select2-hidden-accessible" name=""
                                                    style="width:100% !important;" id="elementId" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="227">Chọn
                                                        sản
                                                        phẩm</option>
                                                    @foreach ($product as $key => $value)
                                                        <option value="{{ $value->prd_id }}">
                                                            {{ $value->prd_name }}
                                                        </option>
                                                    @endforeach
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="226" style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-add_id-34-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-add_id-34-container" role="textbox"
                                                                aria-readonly="true" title="Chọn sản phẩm"></span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span> <span
                                                    class="add_attr"></span>
                                            </td>
                                            <td>
                                                <input type="text" id="prd_id" class="add_sku form-control" value="0"
                                                    name="add_id">
                                            </td>
                                            <td>
                                                <input onchange="" type="number" min="0" class="add_price form-control"
                                                    name="add_price" id="prd_price" value="0" name="prd_price">
                                            </td>
                                            <td>
                                                <input onchange="Setnumber()" type="number" min="0"
                                                    class="add_qty form-control" name="add_qty" name="add_qty"
                                                    id="prd_number" value="0">
                                            </td>
                                            <td>
                                                <input type="number" disabled="" class="add_total form-control" value="0"
                                                    id="total3">
                                            </td>
                                            <td><button onclick="$(this).parent().parent().remove();"
                                                    class="btn btn-danger btn-md btn-flat" data-title="Delete"><i
                                                        class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr id="add-item" class="not-print">
                                            <td colspan="7">
                                                <button type="button" class="btn btn-flat btn-success" id="add-item-button"
                                                    title="Thêm sản phẩm"><i class="fa fa-plus"></i> Thêm sản
                                                    phẩm</button>
                                                &nbsp;&nbsp;&nbsp;<button style=" margin-right: 50px;display:none"
                                                    type="submit" class="btn btn-flat btn-warning" id="add-item-button-save"
                                                    title="Save"><i class="fa fa-save"></i> Lưu lại</button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <!---->
                                    <div class="card-footer row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="btn-group float-right">
                                                <input type="submit" class="btn btn-primary">
                                            </div>
                                            <a class="btn-group float-left">
                                                <button type="reset" class="btn btn-warning">Quay lại</button>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
