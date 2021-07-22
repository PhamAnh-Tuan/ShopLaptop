@extends('site.layout.layout')
@section('content')
    @include('site.layout.slidebar')
    @if (Session::has('messageCreate'))
        <div class="alert alert-success" id="success-alert" style="position:fixed;z-index:999;right:8%;top:16%">
            <strong><i class="fas fa-check" style="color:#15AABF"></i></strong>
            {!! Session('messageCreate') !!}
        </div>
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục</h2>
                        @include('site.layout.menu')
                    </div>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items">
                            <!--features_items-->
                            <h2 class="title text-center">Features Items</h2>
                            @foreach ($sanpham as $sp)
                                <form>
                                    @csrf
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <input type="hidden" value="{{ $sp->prd_id }}"
                                                        class="cart_product_id_{{ $sp->prd_id }}">
                                                    <input type="hidden" value="{{ $sp->prd_name }}"
                                                        class="cart_product_name_{{ $sp->prd_id }}">
                                                    <input type="hidden" value="{{ $sp->prd_img }}"
                                                        class="cart_product_image_{{ $sp->prd_id }}">
                                                    <input type="hidden" value="{{ $sp->prd_price }}"
                                                        class="cart_product_price_{{ $sp->prd_id }}">
                                                    <input type="hidden" value="1"
                                                        class="cart_product_qty_{{ $sp->prd_id }}">

                                                    <img src="{{ asset('public/uploads/product') }}/{{ $sp->prd_img }}"
                                                        alt="" />
                                                    <h2>{{ number_format($sp->prd_price, 0, '', '.') }}</h2>
                                                    <a href="{{ route('chitiet', ['slug' => $sp->prd_slug]) }}">
                                                        <p>{{ $sp->prd_name }}</p>
                                                    </a>
                                                    <button type="button" class="btn btn-default add-cart"
                                                        data-id_product="{{ $sp->prd_id }}"><i
                                                            class="fa fa-shopping-cart"></i>Add to
                                                        cart</button>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach

                        </div>

                        <div class="recommended_items">
                            <!--recommended_items-->
                            <h2 class="title text-center">Sản phẩm bán chạy</h2>

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @for ($i = 0; $i < 3; $i++)
                                            <form>
                                                @csrf
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <input type="hidden" value="{{ $sanphambc[$i]->prd_id }}"
                                                                    class="cart_product_id_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_name }}"
                                                                    class="cart_product_name_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_img }}"
                                                                    class="cart_product_image_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_price }}"
                                                                    class="cart_product_price_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden" value="1"
                                                                    class="cart_product_qty_{{ $sanphambc[$i]->prd_id }}">

                                                                <img src="{{ asset('public/uploads/product') }}/{{ $sanphambc[$i]->prd_img }}"
                                                                    alt="" />
                                                                <h2>{{ number_format($sanphambc[$i]->prd_price, 0, '', '.') }}
                                                                </h2>
                                                                <a
                                                                    href="{{ route('chitiet', ['slug' => $sanphambc[$i]->prd_slug]) }}">
                                                                    <p>{{ $sanphambc[$i]->prd_name }}</p>
                                                                </a>
                                                                <button type="button" class="btn btn-default add-cart"
                                                                    data-id_product="{{ $sanphambc[$i]->prd_id }}"><i
                                                                        class="fa fa-shopping-cart"></i>Add to
                                                                    cart</button>
                                                            </div>
                                                        </div>
                                                        <div class="choose">
                                                            <ul class="nav nav-pills nav-justified">
                                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to
                                                                        wishlist</a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to
                                                                        compare</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endfor
                                    </div>
                                    <div class="item">
                                        @for ($i = 3; $i < 6; $i++)
                                            <form>
                                                @csrf
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <input type="hidden" value="{{ $sanphambc[$i]->prd_id }}"
                                                                    class="cart_product_id_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_name }}"
                                                                    class="cart_product_name_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_img }}"
                                                                    class="cart_product_image_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden"
                                                                    value="{{ $sanphambc[$i]->prd_price }}"
                                                                    class="cart_product_price_{{ $sanphambc[$i]->prd_id }}">
                                                                <input type="hidden" value="1"
                                                                    class="cart_product_qty_{{ $sanphambc[$i]->prd_id }}">


                                                                <img src="{{ asset('public/uploads/product') }}/{{ $sanphambc[$i]->prd_img }}"
                                                                    alt="" />
                                                                <h2>{{ number_format($sanphambc[$i]->prd_price, 0, '', '.') }}
                                                                </h2>
                                                                <a
                                                                    href="{{ route('chitiet', ['slug' => $sanphambc[$i]->prd_slug]) }}">
                                                                    <p>{{ $sanphambc[$i]->prd_name }}</p>
                                                                </a>
                                                                <button type="button" class="btn btn-default add-cart"
                                                                    data-id_product="{{ $sanphambc[$i]->prd_id }}"><i
                                                                        class="fa fa-shopping-cart"></i>Add to
                                                                    cart</button>
                                                            </div>
                                                        </div>
                                                        <div class="choose">
                                                            <ul class="nav nav-pills nav-justified">
                                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to
                                                                        wishlist</a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to
                                                                        compare</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endfor
                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel"
                                    data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel"
                                    data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!--/recommended_items-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
