<?php

namespace App\Http\Controllers\Admin\Bill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillModel;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;
class Bill extends Controller
{
    //
    public function Create()
    {
        $supp = SupplierModel::all();
        return view('admin.Bill.Create_Bill', compact('supp'));
    }
    public function All()
    {
        $data['all_bill'] = BillModel::all();
        return view('admin.Bill.All_Bill', $data);
    }
    public function CreatePost(Request $request)
    {

        $bill = new BillModel();
        $bill->bill_total = $request->bill_total;
        $bill->bill_time = $request->bill_time;
        $bill->supp_id = $request->supp_id;
        $bill->save();
        return redirect()->route('bill.all')->with('message', 'Thêm hóa đơn thành công');
    }
    public function Delete($id)
    {
        $bill = BillModel::find($id);
        $bill->delete();
        return redirect()->route('bill.all')->with('message', 'Xóa hóa đơn thành công');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("bill")->whereIn('bill_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Xóa hóa đơn nhập thành công."]);
    }
}
