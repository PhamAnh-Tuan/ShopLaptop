<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_admin')->insert([
            'email' => 'tuanphamacb05@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'Tuấn PC',
            'phone' => '0962437205',
            'created_at' => new DateTime(),
        ]);
    }
}
