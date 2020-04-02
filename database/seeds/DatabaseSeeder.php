<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
// use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create(
            [
                'name' => 'BELLA TOES',
                'price' => '675.00',
                'image' => 's1.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'CHIKKU LOAFERS',
                'price' => '405.00',
                'image' => 's2.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => '(SRV) SNEAKERS',
                'price' => '375.00',
                'image' => 's3.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'SHUBERRY HEELS',
                'price' => '575.00',
                'image' => 's4.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'RED BELLIES',
                'price' => '675.00',
                'image' => 's5.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'CATWALK FLATS',
                'price' => '405.00',
                'image' => 's6.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'RUNNING SHOES',
                'price' => '875.00',
                'image' => 's7.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'SUKUN CASUALS',
                'price' => '505.00',
                'image' => 's8.jpg',
                'top9' => 1,
            ]
        );
        Product::create(
            [
                'name' => 'BANK SNEAKERS',
                'price' => '635.00',
                'image' => 's9.jpg',
                'top9' => 1,
            ]
        );
    }
}
