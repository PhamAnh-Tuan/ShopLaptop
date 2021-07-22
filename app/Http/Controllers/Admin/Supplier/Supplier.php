<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;
class Supplier extends Controller
{
    public function All()
    {
        $all_supplier = SupplierModel::all();
        return view('admin.Supplier.All_Supplier', compact('all_supplier'));
    }
    public function Create()
    {
        return view('admin.Supplier.Create_Supplier');
    }
    public function CreatePost(Request $request)
    {
        $supplier = new SupplierModel();
        $supplier->supp_name = $request->supp_name;
        $supplier->supp_address = $request->supp_address;
        $supplier->supp_phone = $request->supp_phone;
        $supplier->supp_email = $request->supp_email;
        $supplier->save();

        return redirect()->route('supplier.create')->with('message', 'Thêm nhà cung cấp thành công');
    }
    public function Edit($id)
    {
        $edit_value = SupplierModel::find($id);
        return view('admin.Supplier.Edit_Supplier', ['edit_value' => $edit_value]);
    }
    public function UpdatePost(Request $request, $id)
    {
        $supplier = SupplierModel::find($id);
        $supplier->supp_name = $request->supp_name;
        $supplier->supp_address = $request->supp_address;
        $supplier->supp_phone = $request->supp_phone;
        $supplier->supp_email = $request->supp_email;
        $supplier->save();
        return redirect()->route('supplier.all')->with('message', 'Cập nhật nhà cung cấp thành công');
    }
    public function Delete($id)
    {
        $supplier = SupplierModel::find($id);
        $supplier->delete();
        return redirect()->route('supplier.all')->with('message', 'Xóa nhà cung cấp thành công');
    }
    public function DeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("supplier")->whereIn('supp_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Xóa nhà cung cấp thành công."]);
        return redirect()->back();
    }
}
