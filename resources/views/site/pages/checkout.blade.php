@extends('site.layout.layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12">
                        <p>Thông tin người mua</p>
                    </div>
                    <form action="{{ route('order.save') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            {{-- <div class="alert alert-danger">
                                <ul> --}}
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                {{-- </ul>
                            </div> --}}
                        @endif
                        <div class="col-sm-4 clearfix">
                            <div class="bill-to">
                                <div class="form-one" style="width:100%;margin-bottom:25px">
                                    <input type="text" placeholder="Họ và tên" name="user_name" class="form-control"
                                        style="margin-bottom:12px">
                                    <input type="text" placeholder="Số điện thoại" name="user_phone"
                                        pattern="{1}[0-9]{2} [0-9]{3}.[0-9]{3}.[0-9]{3}" class="form-control"
                                        style="margin-bottom:12px">
                                    <input type="text" placeholder="Tỉnh/TP" name="name_city" class="form-control"
                                        style="margin-bottom:12px">
                                    <input type="text" placeholder="Quận/Huyện" name="name_district" class="form-control"
                                        style="margin-bottom:12px">
                                    <input type="text" placeholder="Phường/Xã" name="name_ward" class="form-control"
                                        style="margin-bottom:12px">
                                    <input type="text" placeholder="Số nhà, tên đường" name="name_street"
                                        class="form-control" style="margin-bottom:12px">
                                    <textarea rows="6" placeholder="Ghi chú" name="ord_note" style="margin-top:15px"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed" style="text-align:center">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Ảnh</td>
                                            <td class="description">Tên</td>
                                            <td class="price">Giá</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Số tiền</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Session()->get('cart') as $key => $cart)
                                            <tr>
                                                <td class="cart_product">
                                                    <img src="{{ asset('public/uploads/product/' . $cart['product_image']) }}"
                                                        alt="" style="width:90px" />
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href=""></a></h4>
                                                    <p>{{ $cart['product_name'] }}</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>{{ number_format($cart['product_price'], 0, ',', '.') }}đ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    <p>
                                                        {{ $cart['product_qty'] }}
                                                    </p>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">
                                                        @php
                                                            $tien = $cart['product_qty'] * $cart['product_price'];
                                                        @endphp
                                                        {{ number_format($tien, 0, ',', '.') }}đ
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tr>
                                                        <td>Tổng:</td>
                                                        @php
                                                            $total = 0;
                                                            foreach (Session()->get('cart') as $key => $cart) {
                                                                $total += $cart['product_qty'] * $cart['product_price'];
                                                            }
                                                        @endphp
                                                        <td><span>{{ number_format($total, 0, ',', '.') }}đ</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <input type="submit" value="Thanh toán" style="margin-top:5px;float:right"
                                    class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
