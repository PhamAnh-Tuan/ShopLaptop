<?php

namespace App\Http\Controllers\Admin\BillDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillDetailsModel;
use App\Models\BillModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;

class BillDetails extends Controller
{
    //
    public function Create()
    {
        $bill = BillModel::all();
        $product = ProductModel::all();
        return view('admin.Bill_Details.Create_BillDetails', compact('bill', 'product'));
    }
    public function All()
    {
        $data['all_billdetails'] = BillDetailsModel::all();
        return view('admin.Bill_Details.All_BillDetails', $data);
    }
    public function CreatePost(Request $request)
    {


        $t = 0;
        $billdetails = new BillDetailsModel();
        $billdetails->billdetails_added = $request->billdetails_added;
        $billdetails->billdetails_quantily = $request->billdetails_quantily;
        $billdetails->billdetails_price = $request->billdetails_price;
        $billdetails->prd_id = $request->prd_id;
        $billdetails->bill_id = $request->bill_id;
        $billdetails->save();
        // /luu chi tiet hoa don
        $b_id = $request->bill_id;

        $b_dt = BillDetailsModel::all();
        foreach ($b_dt as $key => $value) {
            if ($value['bill_id'] == $b_id) {
                $t += $value['billdetails_price'] * $value['billdetails_quantily'];
            }
        }
        $bill = BillModel::find($b_id);
        $bill->bill_id = $b_id;
        $bill->supp_id = $bill->supp_id;
        $bill->bill_total = $t;
        $bill->bill_time = $bill->bill_time;
        $bill->save();
        return redirect()->route('billdetails.all')->with('messageCreate', 'Them danh muc san pham thanh cong');


        // $data = array();
        // $data['bill_id'] = $b_id;
        // $data['supp_id'] = $bill->supp_id;
        // $data['bill_total'] = $t;
        // $data['bill_time'] = $bill->bill_time;
        // DB::table('bill')->where('bill_id', $b_id)->update($data);
    }
    public function Edit($id)
    {
        $edit_value = BillDetailsModel::find($id);
        return view('admin.Bill_Details.Edit_BillDetails', ['edit_value' => $edit_value]);
    }
    public function UpdatePost(Request $request, $id)
    {
        $billdetails = BillDetailsModel::find($id);
        $b_id=$billdetails->bill_id;

        $billdetails->bill_id=$request->bill_id;
        $billdetails->prd_id=$request->prd_id;
        $billdetails->billdetails_quantily=$request->billdetails_quantily;
        $billdetails->billdetails_price=$request->billdetails_price;
        $billdetails->save();

        $b_dt = BillDetailsModel::all();$t=0;
        foreach ($b_dt as $key => $value) {
            if ($value['bill_id'] == $b_id) {
                $t += $value['billdetails_price'] * $value['billdetails_quantily'];
            }
        }
        $bill = BillModel::find($b_id);
        $bill->bill_id = $b_id;
        $bill->supp_id = $bill->supp_id;
        $bill->bill_total = $t;
        $bill->bill_time = $bill->bill_time;
        $bill->save();

        return redirect()->route('billdetails.all')->with('messageUpdate', 'Cập nhật danh muc san pham thanh cong');
    }
    public function Delete($id)
    {
        $t = 0;
        $billdetails = BillDetailsModel::find($id);
        $b_id = $billdetails->bill_id;
        $billdetails->delete();

        $b_dt = BillDetailsModel::all();
        foreach ($b_dt as $key => $value) {
            if ($value['bill_id'] == $b_id) {
                $t += $value['billdetails_price'] * $value['billdetails_quantily'];
            }
        }
        $bill = BillModel::find($b_id);
        $bill->bill_id = $b_id;
        $bill->supp_id = $bill->supp_id;
        $bill->bill_total = $t;
        $bill->bill_time = $bill->bill_time;
        $bill->save();
        return redirect()->route('billdetails.all');
    }
}
