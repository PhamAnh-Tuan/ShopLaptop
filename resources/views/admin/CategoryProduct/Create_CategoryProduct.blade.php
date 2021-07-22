@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thêm danh mục sản phẩm</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('category_product.all') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Category Product</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Category Product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Add Category Product</header>
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
                    <form action="{{ route('category.createPost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="cat_name">
                                    <label class="mdl-textfield__label">Tên danh mục</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">

                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <p>Chọn thương hiệu</p>
                                    <select name="brd_id" style="width: 45%;border-radius: 20px;">
                                        @foreach ($brand as $key)
                                            <option value=" {{ $key->brd_id }}">{{ $key->brd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20"></div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <p>Chọn danh mục cha</p>
                                    <select name="cat_parent_id" style="width: 45%;border-radius: 20px;">
                                        <option value="0">--ROOT</option>
                                        @foreach ($category as $key)
                                            <option value=" {{ $key->cat_id }}">{{ $key->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20"></div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <p>Hiển thị - Ẩn</p>
                                    <select name="cat_status" id="" style="width: 45%;border-radius: 20px;">
                                        <option value="0">0 - Ẩn</option>
                                        <option value="1">1 - Hiển thị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea style="resize: none" class="mdl-textfield__input" rows="5" id="education"
                                        name="cat_description"></textarea>
                                    <label class="mdl-textfield__label" for="text7">Mô tả danh mục</label>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink"
                                        name="add_category_product">Thêm</button>
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
