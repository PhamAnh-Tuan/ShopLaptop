<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    //
    protected $table='bill';
    protected $primaryKey='bill_id';

    public function supp(){
        return $this->belongsTo(SupplierModel::class,'supp_id');
    }
}
