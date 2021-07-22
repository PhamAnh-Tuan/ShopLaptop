@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thêm chi tiết hóa đơn nhập</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('brand.all') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Bill Details</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Bill Details</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Add Bill Details</header>
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
                    <form action="{{ route('billdetails.createPost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="date" name="billdetails_added">
                                    <label class="mdl-textfield__label">Thời gian tạo</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="number" name="billdetails_quantily">
                                    <label class="mdl-textfield__label">Số lượng</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="number" name="billdetails_price">
                                    <label class="mdl-textfield__label">Giá</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <label>Mã sản phẩm</label>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <select name="prd_id" id="" style="border-radius:15px">
                                        @foreach ($product as $item)
                                            <option value="{{ $item->prd_id }}">{{ $item->prd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <label>Mã hóa đơn</label>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <select name="bill_id" id="" style="border-radius:15px;width:50px">
                                        @foreach ($bill as $item)
                                            <option value="{{ $item->bill_id }}">{{ $item->bill_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Thêm</button>
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
