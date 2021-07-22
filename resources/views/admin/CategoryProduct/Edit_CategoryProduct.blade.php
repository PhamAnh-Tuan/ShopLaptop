@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Cập nhật danh mục sản phẩm</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Category Product</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Category Product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Edit Category Product</header>
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
                    <form action="{{ route('category.updatePost', ['id' => $edit_value->cat_id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="cat_name"
                                        value="{{ $edit_value->cat_name }}">
                                    <label class="mdl-textfield__label">Tên danh mục</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="sample2" readonly tabIndex="-1"
                                        name="cat_status"
                                         @php
                                            if ($edit_value->cat_status == 0) {
                                                echo 'value="Ẩn"';
                                            } else {
                                                echo 'value="Hiển thị"';
                                            }
                                        @endphp>
                                    <label for="sample2" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="sample2" class="mdl-textfield__label">Hiển thị</label>
                                    <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="DE" value="0">Ẩn</li>
                                        <li class="mdl-menu__item" data-val="BY" value="1">Hiển thị</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="" tabIndex="" name="cat_parent_id"
                                        value="{{ $edit_value->cat_parent_id }}">
                                    <label for="sample2" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="sample2" class="mdl-textfield__label">Danh mục cha</label>
                                    <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="DE" value="0">Ẩn</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <label class="" for="text7">Mô tả danh mục</label>
                                    <textarea class="mdl-textfield__input" rows="5" cols="50" id="education"
                                        name="cat_description">{{ $edit_value->cat_description }}</textarea>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Cập
                                        nhật</button>
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
