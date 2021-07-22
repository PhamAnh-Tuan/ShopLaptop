<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

class CategoryController extends Controller
{
    function __construct()
    {
        $danhmuc = CategoryModel::where('cat_status','=','1')->get();
        $sanpham = ProductModel::all();
        $brand = BrandModel::all();
        view()->share('danhmuc', $danhmuc);
        view()->share('sanpham', $sanpham);
        view()->share('brand', $brand);
    }
    public function ProductByCategory($slug)
    {
        $category_slug = $slug;
        Session()->put('category_slug', $slug);

        $sanpham = ProductModel
            ::join('category_product', 'product.cat_id', '=', 'category_product.cat_id')->where('category_product.cat_slug', '=', $slug)
            ->select('product.*')->paginate(8);
        return view('site.pages.categoryproduct', compact('sanpham'));
    }
    public function filter($slug, $name)
    {
        switch ($name) {
            case "price_asc":
                $sanpham = ProductModel::join('category_product', 'product.cat_id', '=', 'category_product.cat_id')->where('category_product.cat_slug', '=', $slug)
                    ->select('product.*')->orderBy('prd_price', 'asc')
                    ->paginate(8);
                break;
            case "price_desc":
                $sanpham = ProductModel::join('category_product', 'product.cat_id', '=', 'category_product.cat_id')->where('category_product.cat_slug', '=', $slug)
                    ->select('product.*')->orderBy('prd_price', 'desc')
                    ->paginate(8);
                break;
            case "create_at":
                $sanpham = ProductModel::join('category_product', 'product.cat_id', '=', 'category_product.cat_id')->where('category_product.cat_slug', '=', $slug)
                    ->select('product.*')->orderBy('created_at', 'desc')
                    ->paginate(8);
                break;
        }
        return view('site.pages.categoryproduct', compact('sanpham'));
    }
    public function demo()
    {
        $all = ProductModel::all();
        $sanpham = ProductModel::where('cat_id', '=', 4)->orderBy('prd_price', 'asc')->paginate(12);
        echo '<pre>';
        print_r($sanpham);
        echo '</pre>';
    }
}
