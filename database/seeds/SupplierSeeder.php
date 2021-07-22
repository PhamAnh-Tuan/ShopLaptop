<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('supplier')->insert([
            [
                'supp_name' => 'Công Ty TNHH Thương Mại Hoàng Phát Hải Phòng',
                'supp_address' => 'Số 4, Lô 2A Lê Hồng Phong, Ngô Quyền, Tp. Hải Phòng - Chi Nhánh: Thanh Hóa',
                'supp_phone' => '03757676',
                'supp_email' => 'lananhhoangphat@gmail.com',
            ],
            [
                'supp_name' => 'Công Ty TNHH Quảng Tin',
                'supp_address' => '6D3 Chu Văn An, Phường 26, Quận Bình Thạnh, TP. Hồ Chí Minh (TPHCM)',
                'supp_phone' => '0989044022',
                'supp_email' => 'quangtin@quangtin.com',
            ],
            [
                'supp_name' => 'Công Ty TNHH Công Nghệ Máy Tính An Phát',
                'supp_address' => 'Số 19, Ngõ 178 Thái Hà - Đống Đa - Tp. Hà Nội (TPHN)',
                'supp_phone' => '0971851111',
                'supp_email' => 'maytinhanphat178@gmail.com',
            ],
            [
                'supp_name' => 'Hộ Kinh Doanh Hoàng Nam',
                'supp_address' => 'Số 10, Ngõ 31, Phố Doãn Kế Thiện, Phường Mai Dịch, Quận Cầu Giấy, Thành Phố Hà Nội',
                'supp_phone' => '091.5500 899',
                'supp_email' => 'sonhh2412@gmail.com',
            ],
            [
                'supp_name' => 'Công Ty TNHH Thương Mại VHC',
                'supp_address' => 'VHC Tower, 399 Phạm Văn Đồng, P. Xuân Đỉnh, Q. Bắc Từ Liêm, TP Hà Nội (TPHN)',
                'supp_phone' => '(024) 37501188',
                'supp_email' => 'online@hc.com.vn',
            ],
        ]);
    }
}
