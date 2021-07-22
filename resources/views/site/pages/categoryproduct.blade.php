@extends('site.layout.layout')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <div class="home-filter hide-on-mobile-tablet ">
                            <span class="home-filter__label ">
                                Sắp xếp theo
                            </span>
                            <div class="home-filter__btn btn " type="button" ng-click=""><a href="{{ route('sortBy', ['slug' => Session()->get('category_slug'), 'name' => 'create_at']) }}">Mới nhất</a><span
                                    class="glyphicon sort-icon" ng-show="sortKey=='hobby'"
                                    ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                            </div>
                            <div class="select-input">
                                <span class="select-input__label">Giá</span>
                                <i class="select-input__icon fas fa-angle-down"></i>
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="{{ route('sortBy', ['slug' => Session()->get('category_slug'), 'name' => 'price_asc']) }}" class="select-input__link">Giá: Thấp đến cao</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="{{ route('sortBy', ['slug' => Session()->get('category_slug'), 'name' => 'price_desc']) }}" class="select-input__link">Giá: Cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @foreach ($sanpham as $sp)
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
            {{ $sanpham->links() }}
            </div>
            </div>
        </div>
    </section>
@endsection
