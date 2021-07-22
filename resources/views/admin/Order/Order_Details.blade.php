@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content" style="min-height:1639px">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header with-border">
                                        <h3 class="card-title">Chi tiết đơn hàng #{{ $edit_order->ord_id }}</h3>
                                        <div class="card-tools not-print">
                                            {{-- <div class="btn-group float-right" style="margin-right: 0px">
                                                <a href="http://localhost/s-cart/public/sc_admin/order"
                                                    class="btn btn-flat btn-default"><i class="fa fa-list"></i>&nbsp;Danh
                                                    sách</a>
                                            </div> --}}
                                            <div class="btn-group float-right" style="margin-right: 10px">
                                                <form action="{{ route('export_excel') }}" method="POST">
                                                    @csrf
                                                    <input type="submit" value="Export Excel" name="export_csv"
                                                        class="btn btn-success">
                                                </form>
                                            </div>
                                            <div class="btn-group float-right"
                                                style="margin-right: 10px;border:1px solid #c5b5b5;">
                                                <a href="{{ route('order.downpdf', ['checkout' => $edit_order->ord_id]) }}"
                                                    class="btn btn-flat" title="Export" onclick=""><i
                                                        class="fa fa-print"></i><span class="hidden-xs">
                                                        Print</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('order.update', ['id' => $edit_order->ord_id]) }}"
                                        method="post">
                                        @csrf
                                        <div class="row" id="order-body">
                                            <div class="col-sm-6">
                                                <table class="table table-hover box-body text-wrap table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="td-title">Họ tên:</td>
                                                            <td><a href="#"
                                                                    class="updateInfoRequired editable editable-click"
                                                                    data-name="last_name" data-type="text" data-pk="3"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Họ" data-original-title=""
                                                                    title="">{{ $edit_order->user_name }}</a>
                                                            </td>
                                                            {{--  --}}
                                                            <td>
                                                                <a href="#" class="editable" data-type="select"
                                                                    data-pk="{ id: 2, db: 'bill_detail' }" data-name="color"
                                                                    data-title="Màu sắc"
                                                                    data-source="[{ value: &#039;#eaadad&#039;, text: &#039;Hồng phấn&#039; }, { value: &#039;#000000&#039;, text: &#039;Đen&#039; }, { value: &#039;#83c3ea&#039;, text: &#039;Xanh ngọc&#039; }, { value: &#039;#565335&#039;, text: &#039;Nâu&#039; }, { value: &#039;#f4cba8&#039;, text: &#039;Cam nhạt&#039; }, ]"
                                                                    data-value="#eaadad">Hồng phấn</a>
                                                            </td>
                                                            <td class="text-right">
                                                                <a href="#" class="editable" data-type="select"
                                                                    data-pk="{ id: 2, db: 'bill_detail' }" data-name="size"
                                                                    data-title="Kích cỡ"
                                                                    data-source="[{ value: &#039;35&#039;, text: &#039;35&#039; }, { value: &#039;35.5&#039;, text: &#039;35.5&#039; }, { value: &#039;36&#039;, text: &#039;36&#039; }, { value: &#039;38&#039;, text: &#039;38&#039; }, { value: &#039;39.5&#039;, text: &#039;39.5&#039; }, { value: &#039;40&#039;, text: &#039;40&#039; }, { value: &#039;41&#039;, text: &#039;41&#039; }, { value: &#039;41.5&#039;, text: &#039;41.5&#039; }, ]"
                                                                    data-value="38">38</a>
                                                            </td>
                                                            <td class="text-right">
                                                                <a href="#" class="editable" data-type="number" min="0"
                                                                    data-pk="{ id: 2, db: 'bill_detail' }" data-name="price"
                                                                    data-title="Giá bán">2450000</a>
                                                            </td>
                                                            <td class="text-right">
                                                                x <a href="#" class="editable" data-type="number" min="1"
                                                                    max="99" data-pk="{ id: 2, db: 'bill_detail' }"
                                                                    data-name="quantity" data-title="Số lượng">1</a>
                                                            </td>

                                                            {{--  --}}
                                                        </tr>

                                                        <tr>
                                                            <td class="td-title">Số điện thoại:</td>
                                                            <td><a href="#"
                                                                    class="updateInfoRequired editable editable-click"
                                                                    data-name="phone" data-type="text" data-pk="3"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Số điện thoại" data-original-title=""
                                                                    title="">{{ $edit_order->user_phone }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title">Địa chỉ:</td>
                                                            <td><a href="#"
                                                                    class="updateInfoRequired editable editable-click"
                                                                    data-name="address1" data-type="text" data-pk="3"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Tỉnh/Thành" data-original-title=""
                                                                    title="">{{ $edit_order->user_address }}</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="td-title">Trạng thái đơn hàng:</td>
                                                            <td>
                                                                <div class="form-inline my-2 my-lg-0">
                                                                    <select class="sttod form-select" name="status_method"
                                                                        aria-label="Default select example">
                                                                        @if ($edit_order->ord_status == 'Chưa xác thực')
                                                                            <option value="Chưa xác thực" selected>Chưa xác
                                                                                thực</option>
                                                                            <option value="Đã xác thực">Đã xác thực
                                                                            </option>
                                                                        @else
                                                                            <option value="Đã xác thực" selected>Đã xác thực
                                                                            </option>
                                                                            <option value="Chưa xác thực">Chưa xác
                                                                                thực</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trạng thái vận chuyển:</td>
                                                            <td>
                                                                <div class="form-inline my-2 my-lg-0">
                                                                    <select class="sttod form-select" aria-label=""
                                                                        name="shipping_method">
                                                                        @if ($edit_order->ord_shipping_status == 'Chưa vận chuyển')
                                                                            <option value="Chưa vận chuyển" selected>Chưa
                                                                                vận chuyển</option>
                                                                            <option value="Đang vận chuyển">Đang
                                                                                vận chuyển</option>
                                                                            <option value="Đã vận chuyển">Đã vận
                                                                                chuyển
                                                                            </option>
                                                                        @elseif ($edit_order->ord_shipping_status ==
                                                                            'Đang vận chuyển')
                                                                            <option value="Đang vận chuyển" selected>Đang
                                                                                vận chuyển</option>
                                                                            <option value="Đã vận chuyển">Đã vận
                                                                                chuyển
                                                                            </option>
                                                                        @else
                                                                            <option value="Đã vận chuyển" selected>Đã vận
                                                                                chuyển
                                                                            </option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trạng thái thanh toán:</td>
                                                            <td>
                                                                <select class="sttod form-select" name="payment_method"
                                                                    aria-label="Default select example">
                                                                    @if ($edit_order->ord_payment_status == 'Chưa thanh toán')
                                                                        <option value="Chưa thanh toán" selected>Chưa thanh
                                                                            toán
                                                                        </option>
                                                                        <option value="Đã thanh toán">Đã thanh toán
                                                                        </option>
                                                                    @endif
                                                                    @if ($edit_order->ord_payment_status == 'Đã thanh toán')
                                                                        <option value="Đã thanh toán" selected>Đã thanh toán
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Ngày tạo:</td>
                                                            <td>{{ date('d-m-Y h:i:s', strtotime($edit_order->created_at)) }}
                                                            </td>
                                                        </tr>
                                                        <tr id="" class="not-print">
                                                            <td colspan="7">
                                                                <button type="submit" class="btn btn-flat btn-warning"
                                                                    id="button-save" title="Save"><i class="fa fa-save"></i>
                                                                    Lưu lại</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="form-add-item"
                                        action="{{ route('details.add', ['id' => $edit_order->ord_id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{-- <input type="hidden" name="order_id" value="3"> --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card collapsed-card">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover box-body text-wrap table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tên</th>
                                                                    <th>Mã sp</th>
                                                                    <th class="product_price">Giá bán</th>
                                                                    <th class="product_qty">Số lượng</th>
                                                                    <th class="product_total">Tổng số tiền</th>
                                                                    <th>Hành động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($all_details as $key => $value)
                                                                    <tr>
                                                                        <td>{{ $value->prd_name }}</td>
                                                                        <td>{{ $value->prd_id }}</td>
                                                                        <td class="product_price"><a href="#"
                                                                                class="edit-item-detail editable editable-click"
                                                                                data-value="100000" data-name="price"
                                                                                data-type="number" min="0" data-pk="2"
                                                                                data-url="http://localhost/s-cart/public/sc_admin/order/edit_item"
                                                                                data-title="Giá bán">{{ number_format($value->prd_price, 0, '', '.') }}
                                                                                đ</a></td>
                                                                        <td class="product_qty">x <a href="#"
                                                                                class="edit-item-detail editable editable-click"
                                                                                data-value="1" data-name="qty"
                                                                                data-type="number" min="0" data-pk="2"
                                                                                data-url="http://localhost/s-cart/public/sc_admin/order/edit_item"
                                                                                data-title="Số lượng">
                                                                                {{ $value->quantily }}</a></td>
                                                                        <td class="product_total item_id_2">
                                                                            {{ number_format($value->prd_price * $value->quantily, 0, '', '.') }}
                                                                            đ
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route('details.delete', ['id' => $value->order_details_id]) }}"
                                                                                class="btn btn-danger btn-xs"
                                                                                data-title="Delete"><i class="fa fa-trash"
                                                                                    aria-hidden="true"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                <tr id="details" style="display:none">
                                                                    <td> <select onchange="selectProduct()"
                                                                            class="add_id form-control select2 select2-hidden-accessible"
                                                                            name="" style="width:100% !important;"
                                                                            id="elementId" tabindex="-1" aria-hidden="true">
                                                                            <option value="" data-select2-id="227">Chọn
                                                                                sản
                                                                                phẩm</option>
                                                                            @foreach ($product as $key => $value)
                                                                                <option value="{{ $value->prd_id }}">
                                                                                    {{ $value->prd_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select><span
                                                                            class="select2 select2-container select2-container--default"
                                                                            dir="ltr" data-select2-id="226"
                                                                            style="width: 100%;"><span
                                                                                class="selection"><span
                                                                                    class="select2-selection select2-selection--single"
                                                                                    role="combobox" aria-haspopup="true"
                                                                                    aria-expanded="false" tabindex="0"
                                                                                    aria-disabled="false"
                                                                                    aria-labelledby="select2-add_id-34-container"><span
                                                                                        class="select2-selection__rendered"
                                                                                        id="select2-add_id-34-container"
                                                                                        role="textbox" aria-readonly="true"
                                                                                        title="Chọn sản phẩm"></span><span
                                                                                        class="select2-selection__arrow"
                                                                                        role="presentation"><b
                                                                                            role="presentation"></b></span></span></span><span
                                                                                class="dropdown-wrapper"
                                                                                aria-hidden="true"></span></span> <span
                                                                            class="add_attr"></span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="prd_id"
                                                                            class="add_sku form-control" value="0"
                                                                            name="add_id">
                                                                    </td>
                                                                    <td>
                                                                        <input onchange="" type="number" min="0"
                                                                            class="add_price form-control" name="add_price"
                                                                            id="prd_price" value="0" name="prd_price">
                                                                    </td>
                                                                    <td>
                                                                        <input onchange="Setnumber()" type="number" min="0"
                                                                            class="add_qty form-control" name="add_qty"
                                                                            name="add_qty" id="prd_number" value="0">
                                                                    </td>
                                                                    <td><button
                                                                            onclick="$(this).parent().parent().remove();"
                                                                            class="btn btn-danger btn-md btn-flat"
                                                                            data-title="Delete"><i class="fa fa-times"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr id="add-item" class="not-print">
                                                                    <td colspan="7">
                                                                        <button type="button"
                                                                            class="btn btn-flat btn-success"
                                                                            id="add-item-button" title="Thêm sản phẩm"><i
                                                                                class="fa fa-plus"></i> Thêm sản
                                                                            phẩm</button>
                                                                        &nbsp;&nbsp;&nbsp;<button
                                                                            style=" margin-right: 50px;display:none"
                                                                            type="submit" class="btn btn-flat btn-warning"
                                                                            id="add-item-button-save" title="Save"><i
                                                                                class="fa fa-save"></i> Lưu lại</button>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    {{-- <div class="row">

                                        <div class="col-sm-6">
                                            <div class="card collapsed-card">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="td-title-normal">Subtotal:</td>
                                                            <td style="text-align:right" class="data-subtotal">0</td>
                                                        </tr>




                                                        <tr>
                                                            <td class="td-title-normal">Tax:</td>
                                                            <td style="text-align:right" class="data-tax">0</td>
                                                        </tr>





                                                        <tr>
                                                            <td>Shipping:</td>
                                                            <td style="text-align:right"><a href="#"
                                                                    class="updatePrice data-shipping editable editable-click"
                                                                    data-name="shipping" data-type="text" data-pk="15"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Tiền vận chuyển">0</a></td>
                                                        </tr>




                                                        <tr>
                                                            <td>Discount(-):</td>
                                                            <td style="text-align:right"><a href="#"
                                                                    class="updatePrice data-discount editable editable-click"
                                                                    data-name="discount" data-type="text" data-pk="16"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Giảm giá">0</a></td>
                                                        </tr>





                                                        <tr style="background:#f5f3f3;font-weight: bold;">
                                                            <td>Total:</td>
                                                            <td style="text-align:right" class="data-total">0</td>
                                                        </tr>





                                                        <tr>
                                                            <td>Received(-):</td>
                                                            <td style="text-align:right"><a href="#"
                                                                    class="updatePrice data-received editable editable-click"
                                                                    data-name="received" data-type="text" data-pk="18"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="Đã nhận">0</a></td>
                                                        </tr>


                                                        <tr style="color:#0e9e33;font-weight:bold;" class="data-balance">
                                                            <td>Còn lại:</td>
                                                            <td style="text-align:right">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>



                                        <div class="col-sm-6">
                                            <div class="card">
                                                <table class="table table-hover box-body text-wrap table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="td-title">Ghi chú đơn hàng:</td>
                                                            <td>
                                                                <a href="#"
                                                                    class="updateInfo editable editable-click editable-empty"
                                                                    data-name="comment" data-type="text" data-pk="3"
                                                                    data-url="http://localhost/s-cart/public/sc_admin/order/update"
                                                                    data-title="">Empty</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="card collapsed-card" "="">
                                                                                          <div class=" card-header
                                                border-transparent">
                                                <h3 class="card-title">Lịch sử đơn hàng</h3>
                                                <div class="order-info">
                                                    <span><b>Agent:</b> </span>
                                                    <span><b>IP:</b> </span>
                                                </div>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0 out">
                                                <div class="table-responsive">
                                                    <table class="table m-0" id="history">
                                                        <tbody>
                                                            <tr>
                                                                <th>Nhân viên</th>
                                                                <th>Nội dung</th>
                                                                <th>Thời gian</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Administrator</td>
                                                                <td>
                                                                    <div class="history">Change <b>status</b> from <span
                                                                            style="color:blue">'1'</span> to <span
                                                                            style="color:red">'2'</span></div>
                                                                </td>
                                                                <td>2021-05-01 11:25:25</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                        </div>

                                    </div> --}}
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
{{-- @section('java1')
    <script src="js/x-editable/vendor.min.js"></script>
    <!-- Plugins js -->
    <script src="js/x-editable/moment.min.js"></script>
    <script src="js/x-editable/bootstrap-editable.min.js"></script>
    <!-- Init js-->
    <script src="js/x-editable/form-xeditable.init.js"></script>
    <!-- App js -->
    <script src="js/x-editable/app.min.js"></script>
@endsection --}}
@section()
    $('.editable').editable({
            success: function(response, newValue) {
                console.log(response);
                if(response.status == 'success') {
                    if($(this).attr('data-name') == 'price' || $(this).attr('data-name') == 'quantity') {
                        $("#total_item_" + response.id).html(response.total + "đ");
                        $("#total_bill").html(response.total_bill + "đ");
                    }
                    toastr.success('Đã cập nhật thành công!', 'Thành công', { "closeButton": true });
                } else {
                    if(response.text)
                        toastr.error(response.text, 'Thất bại', { "closeButton": true });
                    else
                        toastr.error('Cập nhật không thành công!', 'Thất bại', { "closeButton": true });
                    return false;
                }
            },
            error: function(response, newValue) {
                // console.log(response);
                toastr.error('Cập nhật không thành công!', 'Thất bại', { "closeButton": true });
            }
        });
@endsection
