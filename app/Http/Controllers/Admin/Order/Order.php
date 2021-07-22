<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\OrderDetailsModel;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Exports\ExcelExports;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Order extends Controller
{
    public function AllOrder()
    {
        $data['all_order'] = OrderModel::where('ord_status', '!=', 'Đã hủy')->get();
        // return $data;
        return view('admin.Order.All_Order', $data);
    }
    public function ViewOrderDetails($id)
    {
        $edit_order = OrderModel::where('ord_id', '=', $id)->first();
        // dd($edit_order);
        $product = ProductModel::all();
        //
        $all_details = OrderDetailsModel::join('order', 'order_details.ord_id', '=', 'order.ord_id')->where('order.ord_id', '=', $id)
            ->join('product', 'order_details.prd_id', '=', 'product.prd_id')
            ->select('order_details.*', 'product.prd_price', 'product.prd_name')->get();
        return view('admin.Order.Order_Details', compact('edit_order', 'all_details', 'product'));
    }
    public function ViewOrderDestroy()
    {
        $all_order = OrderModel::where('ord_status', '=', 'Đã hủy')->get();
        return view('admin.Order.Order_Destroy', compact('all_order'));
    }
    public function Restore($id)
    {
        $order = OrderModel::find($id);
        $order->ord_status='Chưa xác thực';
        $order->save();
        return redirect()->route('order.all')->with('message','Khôi phục đơn hàng thành công');
    }
    public function ProfileProduct($id)
    {
        $product = ProductModel::find($id);
        return $product;
    }
    public function CreateOrder()
    {
        $product=ProductModel::all();
        return view('admin.Order.Create_Order',compact('product'));
    }
    public function CreatePost(Request $request)
    {
        dd($request);
        $order = new OrderModel();
        $order->user_name = $request->user_name;
        $order->user_address = $request->user_address;
        $order->user_phone = $request->user_phone;
        $order->ord_note = $request->ord_note;
        $order->ord_status = $request->status_method;
        $order->ord_payment_status = $request->payment_method;
        $order->ord_shipping_status = $request->shipping_method;
        $order->ord_total = $request->ord_total;
        $order->save();
        return redirect()->route('order.all')->with('message', 'Thêm đơn hàng thành công');
    }
    public function UpdatePost(Request $request, $id)
    {
        $order = OrderModel::find($id);
        $order->ord_status = $request->status_method;
        $order->ord_shipping_status = $request->shipping_method;
        $order->ord_payment_status = $request->payment_method;
        $order->save();
        return redirect()->back()->with('message', 'Cập nhật trạng thái đơn hàng thành công');
    }
    public function CreateDetails(Request $request, $id)
    {
        $sl = $request->add_qty;
        $x = OrderDetailsModel::where('ord_id', $id)->where('prd_id', $request->add_id)->first();
        if (isset($x)) {
            $x->quantily = $x->quantily + $sl;
            $x->save();
        } else {
            $times = time();
            $details = new OrderDetailsModel();
            $details->ord_id = $id;
            $details->prd_id = $request->add_id;
            $details->quantily = $request->add_qty;
            $details->save();
        }
        return redirect()->back()->with('message','Thêm chi tiết thành công');
    }
    public function DestroyOrder($id)
    {
        $details = OrderModel::find($id);

        $details->ord_status = 'Đã hủy';
        $details->save();

        return redirect()->back()->with('message', 'Hủy đơn hàng thành công');
    }
    public function export_csv()
    {
        return Excel::download(new ExcelExports, 'order.xlsx');
    }

    public function print_order($checkout)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout));
        return $pdf->stream();
    }
    public function print_order_convert($checkout)
    {
        $order_details = OrderDetailsModel::where('ord_id', $checkout)->get();
        // $order = OrderModel::where('ord_id', $checkout)->get();
        $order = OrderModel::find($checkout)->first();
        // $order_details_product = OrderDetailsModel::with('product')->where('ord_id', $checkout)->get();
        $order_details_product = DB::table('product')
            ->join('order_details', 'product.prd_id', '=', 'order_details.prd_id')->where('order_details.ord_id', '=', $checkout)
            ->select('product.prd_name','product.prd_price','order_details.quantily')->get();
            // dd($order_details_product);
        $output = '';
        $output .= '
        <style>
        body{
        font-family: DejaVu Sans;
        }
        #table2>tr,th,td{
            text-align:center;
            border:1px solid black;

        }
        #table2{
            border-collapse: collapse;

        }
        </style>
        <h3 style="text-transform:uppercase"><center>Cửa hàng lap top Minh Trí</center></h3>
        <table style="text-align: left;
        border: none;">
        <tbody>';
        $output .= '
        <tr style="text-align: left;
        border: none;">
        <td style="text-align: left;
        border: none;">Tên khách hàng:' . $order->user_name . '</td>

        </tr>
        <tr style="text-align: left;
        border: none;">
        <td style="text-align: left;
        border: none;">Điện thoại:' . $order->user_phone . '</td>
        </tr>
        <tr style="text-align: left;
        border: none;">
        <td colspan="2" style="text-align: left;
        border: none;">Địa chỉ:' . $order->user_address . '</td>
        </tr>
        ';
        $output .= '
        </tbody>
        </table>';

        $output .= '
        <h2></h2>
        <table id="table2">
        <thead class="table-styling">
            <tr>
            <th>STT</th>
             <th>Tên hàng - Dịch vụ</th>
             <th>Số lượng</th>
             <th>Đơn giá</th>
              <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>';
        $total=0;
        $stt=1;
        foreach ($order_details_product as $key => $detail) {
            $sub_total=$detail->prd_price*$detail->quantily;
            $total+=$sub_total;
            $output .= '
        <tr>
        <td>' . $stt++ . '</td>
            <td>' . $detail->prd_name . '</td>
            <td>' . $detail->quantily . '</td>
              <td>' . number_format($detail->prd_price,0,' ','.') . 'đ</td>
             <td>'.$detail->prd_price*$detail->quantily.'</td>
        </tr>';
        }
        $output .= '
        <tr>
        <td colspan="2">
        <p>Tổng tiền:</p>
        </td>
        <td colspan="3">
        <p style="text-align:left;">'.number_format($total,0,' ','.').'</p>
        </td>
        </tr>';

        $output .= '
        </tbody>
        </table>';
        return $output;
    }
    // public function view_order($order_code)
    // {
    //     $order_details = OrderDetailsModel::where('ord_id', $order_code)->get();
    //     $order = OrderModel::where('ord_id', $order_code)->get();
    //     $order_details = OrderDetailsModel::with('product')->where('ord_id', $order_code)->get();
    // }
    public function profile($prd_id)
    {
        $product = ProductModel::find($prd_id)->first();
        return $product;
    }
}
