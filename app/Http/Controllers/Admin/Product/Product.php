<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class Product extends Controller
{
    //
    public function Create()
    {
        $category = CategoryModel::all();
        return view('admin.Product.Create_Product', compact('category'));
    }
    public function All()
    {
        $data['all_product'] = ProductModel::all();
        return view('admin.Product.All_Product', $data);
    }
    public function CreatePost(Request $request)
    {
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('public/uploads/product/'), $file_name);

        $product = new ProductModel();
        $product->prd_name = $request->prd_name;
        $product->prd_img = $file_name;
        $product->cat_id = $request->cat_id;
        $product->prd_cpu = $request->prd_cpu;
        $product->prd_operating = $request->prd_operating;
        $product->prd_ram = $request->prd_ram;
        $product->prd_gpu = $request->prd_gpu;
        $product->prd_monitor = $request->prd_monitor;
        $product->prd_ssd = $request->prd_ssd;
        $product->prd_hdd = $request->prd_hdd;
        $product->prd_optical = $request->prd_optical;
        $product->prd_lan = $request->prd_lan;
        $product->prd_wireless_lan = $request->prd_wireless_lan;
        $product->prd_keyboard = $request->prd_keyboard;
        $product->prd_ports = $request->prd_ports;
        $product->prd_battery = $request->prd_battery;
        $product->prd_weight = $request->prd_weight;
        $product->prd_number = $request->prd_number;
        $product->prd_price = $request->prd_price;
        $product->prd_slug=Str::slug($request->prd_name,'-');
        // dd($product);
        $product->save();

        return redirect()->route('product.all')->with('message', 'Thêm sản phẩm thành công');
    }
    public function Edit($id)
    {
        $edit_value = ProductModel::find($id);
        return view('admin.Product.Edit_Product', ['edit_value' => $edit_value]);
    }
    public function UpdatePost(Request $request, $id)
    {
        $product = ProductModel::find($id);
        if ($request->image != '') {
            $file_old = base_path('public/uploads/product/') . $product->prd_img;
            if (is_file($file_old)) {
                unlink($file_old);
            }
            $file = $request->file('image');

            $file_name = $file->getClientOriginalName();
            $file->move(base_path('public/uploads/product/'), $file_name);
        } else {
            $file_name = $product->prd_img;
        }
        $product->prd_name = $request->prd_name;
        $product->prd_img = $file_name;
        $product->cat_id = $request->cat_id;
        $product->prd_cpu = $request->prd_cpu;
        $product->prd_operating = $request->prd_operating;
        $product->prd_ram = $request->prd_ram;
        $product->prd_gpu = $request->prd_gpu;
        $product->prd_monitor = $request->prd_monitor;
        $product->prd_ssd = $request->prd_ssd;
        $product->prd_hdd = $request->prd_hdd;
        $product->prd_optical = $request->prd_optical;
        $product->prd_lan = $request->prd_lan;
        $product->prd_wireless_lan = $request->prd_wireless_lan;
        $product->prd_keyboard = $request->prd_keyboard;
        $product->prd_ports = $request->prd_ports;
        $product->prd_battery = $request->prd_battery;
        $product->prd_weight = $request->prd_weight;
        $product->prd_number = $request->prd_number;
        $product->prd_price = $request->prd_price;
        $product->prd_slug=Str::slug($request->prd_name);
        $product->save();
        return redirect()->route('product.all')->with('message', 'Cập nhật sản phẩm thành công');
    }
    public function Delete($id)
    {
        $brand = ProductModel::find($id);
        $brand->delete();
        return redirect()->route('product.all')->with('message','Xóa sản phẩm thành công');
    }
    public function DeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("product")->whereIn('prd_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Xóa sản phẩm thành công."]);
        return redirect()->back();
    }
}
