<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    //
    protected $table='brand';
    protected $primaryKey='brd_id';
    protected $fillable = [
        'brd_id',
        'brd_name',
        'brd_description',

    ];
}
