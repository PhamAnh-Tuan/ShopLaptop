@extends('site.layout.layout')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        @foreach ($brand as $sp)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('public/uploads/product') }}/{{ $sp->prd_img }}"
                                                alt="" />
                                            <h2>{{ number_format($sp->prd_price, 0, '', '.') }}</h2>
                                            <p>{{ $sp->prd_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to
                                                cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ number_format($sp->prd_price, 0, '', '.') }}</h2>
                                                <p>{{ $sp->prd_name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 padding-right">
                    {!! $brand->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
