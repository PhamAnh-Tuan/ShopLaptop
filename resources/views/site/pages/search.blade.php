@extends('site.layout.layout')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        @php
                            if ($search != '') {
                                $s=Session()->get('search');
                                echo '<h2 class="" style="font-size: 1.786em;line-height: 1.6em;color:#333E48;">Kết quả tìm kiếm: "'.$s.'"</h2>';
                            }
                        @endphp
                        @foreach ($search as $sp)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('public/uploads/product') }}/{{ $sp->prd_img }}"
                                                alt="" />
                                            <h2>{{ number_format($sp->prd_price, 0, '', '.') }}</h2>
                                            <a href="{{ route('chitiet', ['slug' => $sp->prd_slug]) }}">
                                                <p>{{ $sp->prd_name }}</p>
                                            </a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to
                                                cart</a>
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
                    {!! $search->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
