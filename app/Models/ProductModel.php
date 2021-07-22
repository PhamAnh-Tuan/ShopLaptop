<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\{belongsTo};


class ProductModel extends Model
{
    //
    protected $table='product';
    protected $primaryKey='prd_id';
    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'cat_id');
    }

    public function scopeSearch($query, $key)
    {
        $products = $query->where('prd_name', 'like', '%' .$key. '%')->orWhere('prd_price','=',$key)->orWhere('prd_price','<',$key);
        return $products;
    }
}
