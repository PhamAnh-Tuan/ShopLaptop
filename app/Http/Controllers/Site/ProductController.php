<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
class ProductController extends Controller
{
    function __construct()
    {
        $danhmuc = CategoryModel::where('cat_status','=','1')->get();
        // $sanpham = ProductModel::all();
        $brand=BrandModel::all();
        view()->share('danhmuc', $danhmuc);
        // view()->share('sanpham', $sanpham);
        view()->share('brand',$brand);
    }
    public function ProductDetails($slug)
    {
        $id=ProductModel::join('category_product', 'product.cat_id', '=', 'category_product.cat_id')->where('prd_slug','=',$slug)
        ->select('product.prd_id')->get();
        $sptt=ProductModel::where('cat_id','=',$id);
        $product = ProductModel::where('prd_slug','=',$slug)->first();
        return view('site.pages.productdetails', compact('sptt','product'));
    }
}
