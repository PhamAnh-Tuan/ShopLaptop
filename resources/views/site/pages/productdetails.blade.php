@extends('site.layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>
                    @include('site.layout.menu')
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('public/uploads/product') }}/{{ $product->prd_img }}" alt="" />
                                <h3>ZOOM</h3>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="" class="newarrival" alt="" />
                                <h2>{{ $product->prd_name }}</h2>
                                <p>Web ID: {{ $product->prd_id }}</p>
                                <img src="images/product-details/rating.png" alt="" />
                                <span>
                                    <span>{{ number_format($product->prd_price, 0, '', '.') }}</span>
                                    {{-- <input type="text" value="{{ $product->prd_number }}" /> --}}
                                </span>
                                <p>Tình trạng:
                                    @if ($product->prd_number > 0)
                                        Còn hàng
                                    @else
                                        Hết hàng
                                    @endif
                                </p>
                                <form>
                                    @csrf
                                    <div style="display:flex;align-items:center">
                                        <input type="hidden" value="{{ $product->prd_id }}"
                                            class="cart_product_id_{{ $product->prd_id }}">
                                        <input type="hidden" value="{{ $product->prd_name }}"
                                            class="cart_product_name_{{ $product->prd_id }}">
                                        <input type="hidden" value="{{ $product->prd_img }}"
                                            class="cart_product_image_{{ $product->prd_id }}">
                                        <input type="hidden" value="{{ $product->prd_price }}"
                                            class="cart_product_price_{{ $product->prd_id }}">
                                        {{-- <input type="hidden" value="1"> --}}

                                        <div class="buttons_added">
                                            <input class="minus is-form" type="button" value="-">
                                            <input aria-label="quantity" max="{{ $product->prd_number }}" min="1"
                                                type="number" value="1"
                                                class="input-qty cart_product_qty_{{ $product->prd_id }}" name="">
                                            <input class="plus is-form" type="button" value="+">
                                        </div>
                                        {{-- <div class="buttons_added">
                                            <input class="minus is-form" type="button" value="-">
                                            <input aria-label="quantity" class="input-qty" max="Số tối đa" min="Số tối thiểu" name="" type="number" value="">
                                            <input class="plus is-form" type="button" value="+">
                                          </div> --}}

                                        <button type="button" class="btn btn-fefault cart add-cart"
                                            data-id_product="{{ $product->prd_id }}" name="add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng</button>
                                        {{-- <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button> --}}
                                    </div>
                                </form>

                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <div>
                    <h2 style="margin-bottom:15px;font-weight: 300;">Thông tin bổ sung</h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">CPU</th>
                                    <td>{{ $product->prd_cpu }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hệ điều hành</th>
                                    <td>{{ $product->operating }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">RAM</th>
                                    <td>{{ $product->prd_ram }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">GPU</th>
                                    <td>{{ $product->prd_gpu }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Màn hình</th>
                                    <td>{{ $product->prd_monitor }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">SSD</th>
                                    <td>{{ $product->prd_ssd }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">HDD</th>
                                    <td>{{ $product->prd_hdd }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ổ đĩa quang</th>
                                    <td>{{ $product->prd_optical }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">LAN</th>
                                    <td>{{ $product->prd_lan }}</td>
                                </tr>
                                 <tr>
                                    <th scope="row">Wireless lan</th>
                                    <td>{{ $product->prd_wireless_lan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cổng</th>
                                    <td>{{ $product->prd_ports }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bàn phím</th>
                                    <td>{{ $product->prd_keyboard }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pin</th>
                                    <td>{{ $product->prd_battery }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Trọng lượng</th>
                                    <td>{{ $product->prd_weight }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
