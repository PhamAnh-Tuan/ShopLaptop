<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Category;
use App\Models\CategoryModel;
use Illuminate\Support\Str;

class CategoryProduct extends Controller
{
    public function Create()
    {
        $brand = BrandModel::all();
        $category = CategoryModel::all();
        return view('admin.CategoryProduct.Create_CategoryProduct', compact('brand', 'category'));
    }
    public function All()
    {
        $data['all_category_product'] = CategoryModel::all();
        return view('admin.CategoryProduct.All_CategoryProduct', $data);
    }
    public function CreatePost(Request $request)
    {
        // $data = array();
        // $data['name'] = $request->category_product_name;
        // $data['description'] = $request->category_product_description;
        // if($request->category_product_status="Hiển thị"){
        //     $data['status']=1;
        // }
        // else{
        //     $data['status']=0;
        // }
        // DB::table('category_product')->insert($data);
        $category = new CategoryModel();
        $category->cat_name = $request->cat_name;
        $category->brd_id = $request->brd_id;
        $category->cat_description = $request->cat_description;
        $category->cat_status = $request->cat_status;
        $category->cat_parent_id = $request->cat_parent_id;
        $category->cat_slug=Str::slug($request->cat_name);
        $category->save();
        return redirect()->route('category_product.all')->with('message', 'Thêm danh mục sản phẩm thành công');
    }
    public function Edit($id)
    {
        $edit_value = CategoryModel::find($id);
        return view('admin.CategoryProduct.Edit_CategoryProduct', ['edit_value' => $edit_value]);
    }
    public function UpdatePost(Request $request, $id)
    {
        $cat = CategoryModel::find($id);
        $cat->cat_name=$request->cat_name;
        if($request->cat_status=="Hiển thị"){
            $cat->cat_status=1;
        }
        if($request->cat_status=="Ẩn"){
            $cat->cat_status=0;
        }
        $cat->cat_description=$request->cat_description;
        $cat->cat_parent_id=$request->cat_parent_id;
        $cat->cat_slug=Str::slug($request->cat_name);
        $cat->save();
        return redirect()->route('category_product.all')->with('message', 'Cập nhật danh mục sản phẩm thành công');
    }
    public function Delete($id)
    {
        $cat = CategoryModel::find($id);
        $cat->delete();
        return redirect()->route('category_product.all')->with('message', 'Xóa danh mục sản phẩm thành công');
    }
    public function DeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("category_product")->whereIn('cat_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Xóa danh mục thành công."]);
        return redirect()->back();
    }
}
