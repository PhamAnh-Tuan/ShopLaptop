<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            [
                'user_name'=>'Mai Hoàng Thái Bảo',
                'user_address'=>'610/huỳnh tấn phát, phường Tân Phú, Quận 7, TP. Hồ Chí Minh',
                'user_phone'=>'0976377898',
                'ord_note'=>'gửi nhanh cho tôi nhé',
                'ord_status'=>'Chưa xác thực',
                'ord_shipping_status'=>'Chưa được gửi',
                'ord_payment_status'=>'Chưa thanh toán',
                'ord_total'=>24990000,
                'ord_date_created'=>'2021-05-10'
            ],
            [
                'user_name'=>'Hồ Văn Tuân',
                'user_address'=>'610/huỳnh tấn phát, phường Tân Phú, Quận 7, TP. Hồ Chí Minh',
                'user_phone'=>'0976377398',
                'ord_note'=>'gửi nhanh cho tôi nhé',
                'ord_status'=>'Chưa xác thực',
                'ord_shipping_status'=>'Chưa được gửi',
                'ord_payment_status'=>'Chưa thanh toán',
                'ord_total'=>24990000,
                'ord_date_created'=>'2021-05-10'
            ],
        ]);
    }
}
