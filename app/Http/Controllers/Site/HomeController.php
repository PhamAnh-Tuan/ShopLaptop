<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Helpers\Helper;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function __construct()
    {
        $danhmuc = CategoryModel::where('cat_status','=','1')->get();
        $sanpham = ProductModel::Limit(9)->get();
        $sanphambc=DB::table('order')->join('order_details','order.ord_id','=','order_details.ord_id')
        ->join('product','product.prd_id','=','order_details.prd_id')
        ->orderBy(DB::raw('sum(order_details.quantily)'), 'DESC')
        ->select(DB::raw('order_details.prd_id'),DB::raw('sum(quantily)'),'product.prd_id','product.prd_name','product.prd_slug','product.prd_price','product.prd_img')
        ->groupBy(DB::raw('order_details.prd_id'),'product.prd_id','product.prd_name','product.prd_slug','product.prd_price','product.prd_img')->Limit(6)
        ->get();
        $brand = BrandModel::all();
        view()->share('danhmuc', $danhmuc);
        view()->share('sanpham', $sanpham);
        view()->share('brand', $brand);
        view()->share('sanphambc', $sanphambc);
    }
    public function index()
    {
        return view('site.pages.home');
    }
    public function search(Request $request)
    {

        $keywords = $request->key;
        Session()->put('search',$keywords);
        $products = ProductModel::search($request->key)->paginate(12);

        return view('site.pages.search', ['search' => $products]);
    }
    public function BrandProduct($slug)
    {
        $brand = DB::table('product')
            ->join('category_product', 'product.cat_id', '=', 'category_product.cat_id')
            ->join('brand', 'category_product.brd_id', '=', 'brand.brd_id')->where('brand.brd_slug', '=', $slug)
            ->select('product.*')
            ->paginate(8);
            return view('site.pages.brandproduct', compact('brand'));
    }
}
