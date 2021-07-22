<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\OrderDetailsModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Cart;
use DateTime;


class CartController extends Controller
{
    public function index()
    {
        return view('site.cart.cart');
    }
    public function save_cart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session()->get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $cart[$key]['product_qty'] += $data['cart_product_qty'];
                    Session()->put('cart', $cart);
                    $is_avaiable ++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session()->put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session()->put('cart', $cart);
        }

        Session()->save();
    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session()->get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session()->put('cart', $cart);
            return redirect()->back();
        }
    }
    public function delete_product($session_id)
    {
        $cart = Session()->get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session()->put('cart', $cart);
            return redirect()->back();
        }
    }
    public function checkout()
    {
        return view('site.pages.checkout');
    }
    public function save_order(Request $request)
    {
        $request->validate([
            'user_name.required' => 'Vui lòng nhập tên',
            // 'user_address' => 'required',
            // 'user_phone' => 'required',
        ]);
        $cart = Session()->get('cart');
        $t = 0;
        foreach ($cart as $session => $val) {
            $t += $val['product_qty'] * $val['product_price'];
        }

        $data=$request->all();
        $od_id = OrderModel::create([
            'user_name' => $request->user_name,
            'user_address' => $request->name_street . ', ' . $request->name_ward . ', ' . $request->name_district . ', ' . $request->name_city,
            'user_phone' => $request->user_phone,
            'ord_note' => $request->ord_note,
            'ord_status' => 'Chưa xác thực',
            'ord_shipping_status' => 'Chưa được gửi',
            'ord_payment_status' => 'Chưa thanh toán',
            'ord_total' => $t,
            'ord_date_created'=>date('Y-m-d')
        ])->ord_id;


        foreach ($cart as $session => $val) {
            $order_details = new OrderDetailsModel();
            // $order_details->order_details_id = 'CTDH' . date("Y-m-d", $times) . rand();
            $order_details->ord_id = $od_id;
            $order_details->prd_id = $val['product_id'];
            $order_details->quantily = $val['product_qty'];
            $order_details->save();
        }
        //
        foreach ($cart as $key => $val) {
            unset($cart[$key]);
        }
        Session()->put('cart', $cart);
        return redirect()->route('trangchu')->with('messageCreate','Thanh toán thành công');
    }
}
