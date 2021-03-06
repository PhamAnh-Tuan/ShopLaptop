@extends('admin.admin_layout')
@section('admin_content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thêm hóa đơn nhập</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('bill.all') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">bill</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Bill</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Add bill</header>
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
                    <form action="{{ route('bill.createPost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="number" name="bill_total">
                                    <label class="mdl-textfield__label">Tổng tiền</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="datetime-local" name="bill_time">
                                    <label class="mdl-textfield__label">Thời gian</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                            <label>Nhà cung cấp</label>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <select name="supp_id" id="" style="border-radius:15px">
                                        @foreach ($supp as $item)
                                            <option value="{{ $item->supp_id }}">{{ $item->supp_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink"
                                        name="add_bill">Thêm</button>
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
