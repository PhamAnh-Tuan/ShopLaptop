<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class CategoryModel extends Model
{
    //
    protected $table = 'category_product';
    protected $primaryKey='cat_id';

    // protected $fillable = [
    //     'cat_id',
    //     'brd_id',
    //     'cat_name',
    //     'cat_description',
    //     'cat_status',

    // ];

    public function brands()
    {
        return $this->belongsTo(BrandModel::class, 'brd_id');
    }

    public function products(){
        return $this->hasMany(ProductModel::class, 'cat_id');
    }

    public function children()
    {
        return $this->hasMany(CategoryModel::class, 'cat_parent_id', 'cat_id');
    }

    
}
