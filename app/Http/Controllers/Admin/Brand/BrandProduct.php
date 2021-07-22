<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\BrandModel;
use Illuminate\Support\Str;
class BrandProduct extends Controller
{
    public function Create()
    {
        return view('admin.BrandProduct.Create_BrandProduct');
    }
    public function All()
    {
        // $all_Brand_product=DB::table('brand')->get();
        // $manager_Brand_product=view('admin.BrandProduct.All_BrandProduct')->with('all_Brand_product',$all_Brand_product);
        // return view('admin.admin_layout')->with('admin.BrandProduct.All_BrandProduct',$manager_Brand_product);
        // $all_brand = BrandModel::All();
        // return view('admin.BrandProduct.All_BrandProduct', ['all_brand' => $all_brand]);
        $data['all_brand'] = BrandModel::all();
        return view('admin.BrandProduct.All_BrandProduct', $data);
    }
    public function CreatePost(Request $request)
    {
        // $data = array();
        // $data['brd_name'] = $request->brand_name;
        // $data['brd_img'] = $request->brand_img;
        // $data['brd_description'] = $request->brand_description;
        // DB::table('brand')->insert($data);
        // return redirect()->route('brand.all')->with('messageCreate', 'Them danh muc san pham thanh cong');


        // $this->validate($request,[
        //     'brand_name'=>'required',
        //     'brand_description'=>'required'
        // ],[
        //     'brand_name.required'=>'Bạn chưa nhập tên',
        //     'brand_description.description'=>'Bạn chưa nhập mô tả'
        // ]);
        // $brand = new BrandModel();
        // $brand->brd_name=$request->brand_name;
        // $brand->brd_description=$request->brand_description;

        // if ($request->has('file')) {
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('public/uploads/'), $file_name);

        $brand = new BrandModel();
        $brand->brd_name = $request->brand_name;
        $brand->brd_img = $file_name;
        $brand->brd_description = $request->brand_description;
        $brand->brd_slug = Str::slug($request->brand_name);
        $brand->save();

        return redirect()->route('brand.all')->with('message', 'Thêm thương hiệu sản phẩm thành công');
    }
    public function Edit($id)
    {
        // $edit_Brand_product=DB::table('brand')->where('id',$id)->get();
        // $manager_Brand_product=view('admin.BrandProduct.Edit_BrandProduct')->with('edit_Brand_product',$edit_Brand_product);
        // return view('admin.admin_layout')->with('admin.BrandProduct.All_BrandProduct',$manager_Brand_product);
        $edit_value = BrandModel::find($id);
        return view('admin.BrandProduct.Edit_BrandProduct', ['edit_value' => $edit_value]);
    }
    public function UpdatePost(Request $request, $id)
    {
        // $data=array();
        // $data['name'] = $request->Brand_product_name;
        // $data['description'] = $request->Brand_product_description;
        // if($request->Brand_product_status="Hiển thị"){
        //     $data['status']=1;
        // }
        // else{
        //     $data['status']=0;
        // }
        // DB::table('brand')->where('id',$id)->update($data);
        // return redirect()->route('Brand_product.all')->with('messageUpdate', 'Cập nhật danh muc san pham thanh cong');
        $brand = BrandModel::find($id);
        if ($request->img != '') {
            $file_old = base_path('public/uploads/') . $brand->brd_img;
            if (is_file($file_old)) {
                unlink($file_old);
            }
            $file = $request->file('img');

            $file_name = $file->getClientOriginalName();
            $file->move(base_path('public/uploads/'), $file_name);
        } else {
            $file_name = $brand->brd_img;
        }
        $brand->brd_img         = $file_name;
        $brand->brd_name = $request->brand_name;
        $brand->brd_description = $request->brand_description;
        $brand->brd_slug = Str::slug($request->brand_name);
        $brand->save();
        return redirect()->route('brand.all')->with('message', 'Cập nhật thương hiệu sản phẩm thành công');
    }
    public function Delete($id)
    {
        // DB::table('brand')->where('id',$id)->delete();
        // return redirect()->route('Brand_product.all');
        $brand = BrandModel::find($id);
        $brand->delete();
        return redirect()->route('brand.all')->with('message', 'Xóa thương hiệu sản phẩm thành công');
    }
    public function DeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("brand")->whereIn('brd_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Xóa thương hiệu thành công."]);
        return redirect()->back();
    }
}
