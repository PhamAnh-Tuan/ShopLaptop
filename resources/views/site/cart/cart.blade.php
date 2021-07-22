@extends('site.layout.layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <?php if (Session()->get('cart') == null) { ?>
            <div class="empty"
                style="background: rgb(255, 255, 255);padding: 40px 20px;border-radius: 4px;text-align: center;width: 100%;">
                <img src="images/mascot@2x.png" alt="" class="empty__img" style="width: 190px;">
                <p class="empty__note" style="margin: 15px 0px 30px;">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                <a data-view-id="cart_empty_continue.shopping" href="{{ route('trangchu') }}" class="empty__btn"
                    class="background-color: rgb(253, 216, 53);color: rgb(74, 74, 74);font-weight: 500;padding: 10px 55px;display: inline-block;border-radius: 4px;">Tiếp
                    tục mua sắm</a>
            </div>
            <?php } ?>
            <?php if (Session()->get('cart') != null) { ?>
            <div class="table-responsive cart_info">
                <form action="{{ url('update-cart') }}" method="POST">
                    @csrf
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
                                        <img src="{{ asset('public/uploads/product/' . $cart['product_image']) }}" alt=""
                                            style="width:90px" />
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{ $cart['product_name'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($cart['product_price'], 0, ',', '.') }}đ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <form action="" method="POST">

                                                <input class="cart_quantity_" type="number" min="1"
                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                    value="{{ $cart['product_qty'] }}">
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            @php
                                                $tien = $cart['product_qty'] * $cart['product_price'];
                                            @endphp
                                            {{ number_format($tien, 0, ',', '.') }}đ
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="{{ url('/delete-product') . '/' . $cart['session_id'] }}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>

            <div style="margin-bottom:30px">
                <div style="line-heigh:45px;text-align:right">
                    <span>Tổng tiền:</span>
                    <strong>@php
                        $total = 0;
                        foreach (Session()->get('cart') as $key => $cart) {
                            $total += $cart['product_qty'] * $cart['product_price'];
                        }
                    @endphp
                        {{ number_format($total, 0, ',', '.') }}đ</strong>
                </div>
                <?php } ?>
                <div style="display: flex;
                                            width: 140px;
                                            margin-left: auto;">
                    <a class="btn btn-primary" href="{{ route('checkout') }}" style="display:block;width: 100%;">Tiến
                        hành đặt hàng</a>
                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
