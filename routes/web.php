<?php


use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Exports\ExcelExports;
// use Maatwebsite\Excel\Facades\Excel;
// Route::get('test', function () {
//     return Excel::download(new ExcelExports, 'users.xlsx');
// });

// Frontend
Route::get('/', 'Site\HomeController@index');
Route::get('/trang-chu', 'Site\HomeController@index')->name('trangchu');
Route::get('/laptop/{slug}', 'Site\ProductController@ProductDetails')->name('chitiet');
// Giỏ hàng
Route::get('/cart', 'Site\CartController@index')->name('cart.index');
Route::post('/save-cart', 'Site\CartController@save_cart')->name('cart.save');
Route::post('/update-cart', 'Site\CartController@update_cart')->name('cart.update');
Route::get('/delete-product/{session_id}', 'Site\CartController@delete_product')->name('cart.delete');
//
Route::get('/thuong-hieu/{slug}', 'Site\HomeController@BrandProduct')->name('brand.sp');
Route::get('/danh-muc/{slug}', 'Site\CategoryController@ProductByCategory')->name('category.sp');
//
Route::get('/sortBy/{slug}/{name}', 'Site\CategoryController@filter')->name('sortBy');


//
Route::get('/tim-kiem', 'Site\HomeController@search');

Route::get('/thanh-toan', 'Site\CartController@checkout')->name('checkout');
Route::post('/luu-hoa-don', 'Site\CartController@save_order')->name('order.save');


// Backend
Route::get('authlogin', 'Admin\AdminController@getAuthLogin')->name('login_admin')->middleware('CheckUser');
Route::post('authlogin', 'Admin\AdminController@postAuthLogin');

Route::get('logout', 'Admin\AdminController@Logout')->name('logout');
Route::group(['prefix' => 'trang-quan-tri', 'namespace' => 'Admin', 'middleware' => 'CheckLogout'], function () {
    Route::get('', 'AdminController@show_dashboard');
    Route::get('/dashboard', 'AdminController@show_dashboard')->name('dashboard');

    // Brand product
    Route::group(['prefix' => 'thuong-hieu-sp', 'namespace' => 'Brand', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-thuong-hieu-sp', 'BrandProduct@All')->name('brand.all');
        Route::get('them-thuong-hieu-sp', 'BrandProduct@Create')->name('brand.create');
        Route::post('luu-thuong-hieu-sp', 'BrandProduct@CreatePost')->name('brand.createPost');
        Route::get('chinh-sua-thuong-hieu-sp/{id}', 'BrandProduct@Edit')->name('brand.edit');
        Route::post('cap-nhat-thuong-hieu-sp/{id}', 'BrandProduct@UpdatePost')->name('brand.updatePost');
        Route::get('xoa-thuong-hieu-sp/{id}', 'BrandProduct@Delete')->name('brand.delete');

        Route::get('xoa-nhieu', 'BrandProduct@DeleteAll')->name('brand.deleteAll');
    });
    //
    Route::group(['prefix' => 'nha-cung-cap', 'namespace' => 'Supplier', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-nha-cung-cap', 'Supplier@All')->name('supplier.all');
        Route::get('them-nha-cung-cap', 'Supplier@Create')->name('supplier.create');
        Route::post('luu-nha-cung-cap', 'Supplier@CreatePost')->name('supplier.createPost');
        Route::get('chinh-sua-nha-cung-cap/{id}', 'Supplier@Edit')->name('supplier.edit');
        Route::post('cap-nhat-nha-cung-cap/{id}', 'Supplier@UpdatePost')->name('supplier.updatePost');
        Route::get('xoa-nha-cung-cap/{id}', 'Supplier@Delete')->name('supplier.delete');

        Route::get('xoa-nhieu', 'Supplier@DeleteAll')->name('supplier.deleteAll');
    });

    // Category product
    Route::group(['prefix' => 'danh-muc-sp', 'namespace' => 'Category', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-danh-muc-sp', 'CategoryProduct@All')->name('category_product.all');
        Route::get('them-danh-muc-sp', 'CategoryProduct@Create')->name('category_product.create');
        Route::post('luu-danh-muc-sp', 'CategoryProduct@CreatePost')->name('category.createPost');
        Route::get('chinh-sua-danh-muc-sp/{id}', 'CategoryProduct@Edit')->name('category.edit');
        Route::post('cap-nhat-danh-muc-sp/{id}', 'CategoryProduct@UpdatePost')->name('category.updatePost');
        Route::get('xoa-danh-muc-sp/{id}', 'CategoryProduct@Delete')->name('category.delete');

        Route::get('xoa-nhieu', 'CategoryProduct@DeleteAll')->name('category.deleteAll');
    });

    // Product
    Route::group(['prefix' => 'san-pham', 'namespace' => 'Product', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-sp', 'Product@All')->name('product.all');
        Route::get('them-sp', 'Product@Create')->name('product.create');
        Route::post('luu-sp', 'Product@CreatePost')->name('product.createPost');
        Route::get('chinh-sua-sp/{id}', 'Product@Edit')->name('product.edit');
        Route::post('cap-nhat-sp/{id}', 'Product@UpdatePost')->name('product.updatePost');
        Route::get('xoa-sp/{id}', 'Product@Delete')->name('product.delete');
        Route::get('xoa-nhieu', 'Product@DeleteAll')->name('product.deleteAll');
    });

    // Bill
    Route::group(['prefix' => 'hoa-don-nhap', 'namespace' => 'Bill', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-hoa-don-nhap', 'Bill@All')->name('bill.all');
        Route::get('them-hoa-don-nhap', 'Bill@Create')->name('bill.create');
        Route::post('luu-hoa-don-nhap', 'Bill@CreatePost')->name('bill.createPost');
        Route::get('xoa-hoa-don-nhap/{id}', 'Bill@Delete')->name('bill.delete');
        Route::get('xoa-nhieu', 'Bill@deleteAll')->name('bill.deleteAll');
    });
    // Bill details
    Route::group(['prefix' => 'chi-tiet-hoa-don-nhap', 'namespace' => 'BillDetails', 'middleware' => 'CheckLogout'], function () {
        Route::get('liet-ke-chi-tiet-hoa-don-nhap', 'BillDetails@All')->name('billdetails.all');
        Route::get('them-chi-tiet-hoa-don-nhap', 'BillDetails@Create')->name('billdetails.create');
        Route::post('luu-chi-tiet-hoa-don-nhap', 'BillDetails@CreatePost')->name('billdetails.createPost');
        Route::get('chinh-sua-chi-tiet/{id}', 'BillDetails@Edit')->name('billdetails.edit');
        Route::post('cap-nhat-chi-tiet/{id}', 'BillDetails@UpdatePost')->name('billdetails.updatePost');
        Route::get('xoa-chi-tiet-hoa-don-nhap/{id}', 'BillDetails@Delete')->name('billdetails.delete');
    });
    // Order
    Route::group(['prefix' => 'don-hang', 'namespace' => 'Order', 'middleware' => 'CheckLogout'], function () {
        // Đơn hàng chưa xác thực
        Route::get('', 'Order@AllOrder')->name('order.all');
        Route::get('/them-don-hang', 'Order@CreateOrder')->name('order.add');
        Route::post('/luu-don-hang', 'Order@CreatePost')->name('order.create');
        Route::post('/update-don-hang/{id}', 'Order@UpdatePost')->name('order.update');
        Route::get('/huy-don-hang/{id}', 'Order@DestroyOrder')->name('order.destroy');
        Route::get('/don-hang-da-huy', 'Order@ViewOrderDestroy')->name('order.viewdestroy');
        Route::get('/khoi-phuc/{id}', 'Order@Restore')->name('order.restore');
        //
        Route::get('/details/{id}', 'Order@ViewOrderDetails')->name('order.details');
        Route::get('/profile/{id}', 'Order@ProfileProduct')->name('profile');
        Route::post('/luu-chi-tiet-don-hang/{id}', 'Order@CreateDetails')->name('details.add');
        Route::get('/xoa-chi-tiet-don-hang/{id}', 'Order@DeleteDetails')->name('details.delete');

        Route::post('/export-csv', 'Order@export_csv')->name('export_excel');

        Route::get('/download-pdf/{checkout}', 'Order@print_order')->name('order.downpdf');
    });
});

Route::post('/filter-by-date', 'Admin\AdminController@filter_by_date');
Route::post('/dashboard-filter', 'Admin\AdminController@dashboard_filter');
Route::post('/statistics-30-days-ago', 'Admin\AdminController@statistics_30_days_ago');
