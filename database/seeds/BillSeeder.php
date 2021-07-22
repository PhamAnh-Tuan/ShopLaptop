<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bill')->insert([
            [
                'supp_id' => '1',
            'bill_total' => 19990000,
            'bill_time'=>new DateTime()
            ],
            [
                'supp_id' => '2',
            'bill_total' => 19990000,
            'bill_time'=>new DateTime()
            ],
            [
                'supp_id' => '3',
            'bill_total' => 19990000,
            'bill_time'=>new DateTime()
            ],
        ]);
    }
}
