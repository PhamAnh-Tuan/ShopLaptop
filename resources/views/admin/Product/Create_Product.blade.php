@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thêm sản phẩm</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('product.all') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">product</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Add product</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                            data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>

                        @if (Session::has('messageCreate'))
                            <div class="alert alert-danger" role="alert">
                                {!! Session('messageCreate') !!}
                            </div>

                        @endif
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="panel-button">
                            <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                            <li class="mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                            <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                        </ul>
                    </div>
                    <form action="{{ route('product.createPost') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="sample2" value="" readonly
                                        tabIndex="-1" name="cat_id">
                                    <label for="sample2" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="sample2" class="mdl-textfield__label">Chọn danh mục</label>
                                    <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach ($category as $key)
                                            <li class="mdl-menu__item" data-val="DE" value="0">{{ $key->cat_id }}</li>
                                        @endforeach

                                        {{-- <li class="mdl-menu__item" data-val="BY" value="1">Hiển thị</li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_name">
                                    <label class="mdl-textfield__label">Tên sản phẩm</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <input type='file' onchange="readURL(this);" name="image" />
                                <img id="blah" src="" alt="image product"
                                    style="padding:10px;background:#2d2d2d;max-width:180px;" />
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_cpu">
                                    <label class="mdl-textfield__label">CPU</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_operating">
                                    <label class="mdl-textfield__label">Hệ điều hành</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_ram">
                                    <label class="mdl-textfield__label">Ram</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_gpu">
                                    <label class="mdl-textfield__label">GPU</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_monitor">
                                    <label class="mdl-textfield__label">Màn hình</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_ssd">
                                    <label class="mdl-textfield__label">SSD</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_hdd">
                                    <label class="mdl-textfield__label">HDD</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_optical">
                                    <label class="mdl-textfield__label">Ổ đĩa</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_lan">
                                    <label class="mdl-textfield__label">Lan</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_wireless_lan">
                                    <label class="mdl-textfield__label">Wireless Lan</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_keyboard">
                                    <label class="mdl-textfield__label">Bàn phím</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_ports">
                                    <label class="mdl-textfield__label">Cổng kết nối</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_battery">
                                    <label class="mdl-textfield__label">Pin</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_weight">
                                    <label class="mdl-textfield__label">Trọng lượng</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_number">
                                    <label class="mdl-textfield__label">Số lượng</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="prd_price">
                                    <label class="mdl-textfield__label">Giá</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea style="resize: none" class="mdl-textfield__input" rows="5" id="education"
                                        name="brand_description"></textarea>
                                    <label class="mdl-textfield__label" for="text7">Mô tả thương hiệu</label>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink"
                                        name="add_brand">Thêm</button>
                                    <button type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Quay
                                        lại</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
