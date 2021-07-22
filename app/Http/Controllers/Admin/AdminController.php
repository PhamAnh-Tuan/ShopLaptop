<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function show_dashboard()
    {
        $data['product']=ProductModel::count();
        $data['order_new']=DB::table('order')->where('ord_status', 'Chưa xác thực')->count();
        $data['brand']=DB::table('brand')->count();
        $data['category']=DB::table('category_product')->count();
        $data['supplier']=DB::table('product')->count();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $cuoithangnay=Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();
        $total_now=OrderModel::where('ord_payment_status','=','Đã thanh toán')->whereBetween('ord_date_created',[$dauthangnay,$cuoithangnay])
        ->select(DB::raw('sum(ord_total) as total'))->get()->first();
        $total=OrderModel::where('ord_payment_status','=','Đã thanh toán')
        ->select(DB::raw('sum(ord_total) as total'))->get()->first();
        $not_comfirm=OrderModel::where('ord_status','=','Chưa xác thực')->get();
        return view('admin.dashboard',compact('total_now','total','not_comfirm','data'));
    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$from_date, $to_date])->orderBy('ord_date_created', 'ASC')
            ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
            ->groupBy(DB::raw('ord_date_created'))
            ->get();

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->ord_date_created,
                'order' => $val->total
            );
        }

        echo $data = json_encode($chart_data);
    }
    public function dashboard_filter(Request $request)
    {
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if ($data['dashboard_value'] == '7ngay') {
            $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$sub7days, $now])->orderBy('ord_date_created', 'ASC')
                ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
                ->groupBy(DB::raw('ord_date_created'))
                ->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('ord_date_created', 'ASC')
                ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
                ->groupBy(DB::raw('ord_date_created'))
                ->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {
            $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$dauthangnay, $now])->orderBy('ord_date_created', 'ASC')
                ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
                ->groupBy(DB::raw('ord_date_created'))
                ->get();
        } else {
            $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$sub365days, $now])->orderBy('ord_date_created', 'ASC')
                ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
                ->groupBy(DB::raw('ord_date_created'))
                ->get();
        }
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->ord_date_created,
                'order' => $val->total
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function statistics_30_days_ago(Request $request)
    {
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('order')->where('ord_payment_status', '=', 'Đã thanh toán')->whereBetween('ord_date_created', [$sub30days, $now])->orderBy('ord_date_created', 'ASC')
            ->select(DB::raw('ord_date_created'), DB::raw('sum(ord_total) as total'))
            ->groupBy(DB::raw('ord_date_created'))
            ->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->ord_date_created,
                'order' => $val->total
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function getAuthLogin()
    {
        return view('admin.admin_login');
    }
    public function postAuthLogin(Request $request)
    {
        $arr = [
            'email' => $request->username,
            'password' => $request->pass
        ];
        if (Auth::attempt($arr)) {
            $name=DB::table('tbl_admin')->where('email','=',$request->username)->orWhere('password','=',$request->pass)->select('name')->get()->first();
            Session()->put('user', $name);
            // return view('admin.dashboard');
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login_admin');
    }
}
