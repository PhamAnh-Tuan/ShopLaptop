<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name'=>'Mai Hoàng Thái Bảo',
                'user_email'=>'Thaibao@gmail.com',
                'user_sexist'=>'Nam',
                'user_phone'=>'0976377898',
                'user_pass'=>'12344321',
                'user_birth'=>'2021-04-19',
                'user_img'=>'png.png'
            ],
            [
                'user_name'=>'Hồ Văn Tuân',
                'user_email'=>'Tuanho98@gmail.com',
                'user_sexist'=>'Nam',
                'user_phone'=>'0973377898',
                'user_pass'=>'12344321',
                'user_birth'=>'2021-04-19',
                'user_img'=>'png.png'
            ]
        ]);
    }
}
