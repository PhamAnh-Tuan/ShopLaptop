<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brand')->insert([
            [
                'brd_img' => 'Msi.png',
                'brd_name' => 'MSI',
                'brd_description' => 'Thương hiệu chuyên về laptop hiệu năng cao, chơi game',
                'brd_slug' => 'msi', 'created_at' => new DateTime()
            ],
            [
                'brd_img' => 'Asus.png',
                'brd_name' => 'ASUS',
                'brd_description' => 'Laptop chơi game và thiết kế sang trọng',
                'brd_slug' => 'asus', 'created_at' => new DateTime()
            ],
            [
                'brd_img' => 'images.png',
                'brd_name' => 'DELL',
                'brd_description' => 'Laptop đồ họa chơi game mượt mà',
                'brd_slug' => 'dell', 'created_at' => new DateTime()
            ],
            [
                'brd_img' => 'Acer.png',
                'brd_name' => 'ACER',
                'brd_description' => 'Laptop với thiết kế nổi trội, ấn tượng',
                'brd_slug' => 'acer', 'created_at' => new DateTime()
            ],
        ]);
    }
}
