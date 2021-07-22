<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category_product')->insert(
            [
                ['brd_id' => '1', 'cat_name' => 'LAPTOP MSI', 'cat_description' => 'nam', 'cat_parent_id' => 0, 'cat_status' => 1, 'cat_slug' => 'laptop-msi'],
                ['brd_id' => '1', 'cat_name' => 'MSI Gaming Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'msi-gaming-series'],
                ['brd_id' => '1', 'cat_name' => 'GF Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'gf-series'],
                ['brd_id' => '1', 'cat_name' => 'GL Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'gl-series'],
                ['brd_id' => '1', 'cat_name' => 'GP Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'gp-series'],
                ['brd_id' => '1', 'cat_name' => 'GE Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'ge-series'],
                ['brd_id' => '1', 'cat_name' => 'GS Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'gs-series'],
                ['brd_id' => '1', 'cat_name' => 'GT Series', 'cat_description' => 'nam', 'cat_parent_id' => 1, 'cat_status' => 1, 'cat_slug' => 'gt-series'],



                ['brd_id' => '2', 'cat_name' => 'LAPTOP ASUS', 'cat_description' => 'nam', 'cat_parent_id' => 0, 'cat_status' => 1, 'cat_slug' => 'laptop-asus'],
                ['brd_id' => '2', 'cat_name' => 'TUF Gaming', 'cat_description' => 'nam', 'cat_parent_id' => 9, 'cat_status' => 1, 'cat_slug' => 'tuf-gaming'],
                ['brd_id' => '2', 'cat_name' => 'ROG Strix G', 'cat_description' => 'nam', 'cat_parent_id' => 9, 'cat_status' => 1, 'cat_slug' => 'rog-strix-g'],
                ['brd_id' => '2', 'cat_name' => 'ROG Strix Scar', 'cat_description' => 'nam', 'cat_parent_id' => 9, 'cat_status' => 1, 'cat_slug' => 'rog-strix-scar'],
                ['brd_id' => '2', 'cat_name' => 'ROG Flow', 'cat_description' => 'nam', 'cat_parent_id' => 9, 'cat_status' => 1, 'cat_slug' => 'rog-flow'],
                ['brd_id' => '2', 'cat_name' => 'Rephyrus', 'cat_description' => 'nam', 'cat_parent_id' => 9, 'cat_status' => 1, 'cat_slug' => 'rephyrus'],




                ['brd_id' => '3', 'cat_name' => 'LAPTOP DELL', 'cat_description' => 'nam', 'cat_parent_id' => 0, 'cat_status' => 1, 'cat_slug' => 'laptop-dell'],
                ['brd_id' => '2', 'cat_name' => 'Inspiron G3 Gaming', 'cat_description' => 'nam', 'cat_parent_id' => 15, 'cat_status' => 1, 'cat_slug' => 'inspiron-g3-gaming'],
                ['brd_id' => '2', 'cat_name' => 'Inspiron G5 Gaming', 'cat_description' => 'nam', 'cat_parent_id' => 15, 'cat_status' => 1, 'cat_slug' => 'inspiron-g5-gaming'],





                ['brd_id' => '4', 'cat_name' => 'LAPTOP ACER', 'cat_description' => 'nam', 'cat_parent_id' => 0, 'cat_status' => 1, 'cat_slug' => 'laptop-acer'],
                ['brd_id' => '2', 'cat_name' => 'Aspire 7', 'cat_description' => 'nam', 'cat_parent_id' => 18, 'cat_status' => 1, 'cat_slug' => 'aspire-7'],
                ['brd_id' => '2', 'cat_name' => 'Nitro', 'cat_description' => 'nam', 'cat_parent_id' => 18, 'cat_status' => 1, 'cat_slug' => 'nitro'],
                ['brd_id' => '2', 'cat_name' => 'Predator Helios', 'cat_description' => 'nam', 'cat_parent_id' => 18, 'cat_status' => 1, 'cat_slug' => 'predator-helios'],

            ]
        );
    }
}
