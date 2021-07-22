<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BillDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bill_details')->insert([
            [
                'bill_id' => 1,
                'prd_id' => 74,
                'billdetails_quantily' => 3,
                'billdetails_price' => 17990000
            ],
            [
                'bill_id' => 1,
                'prd_id' => 78,
                'billdetails_quantily' => 3,
                'billdetails_price' => 19490000
            ],
        ]);
    }
}
