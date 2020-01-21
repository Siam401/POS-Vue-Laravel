<?php

use Illuminate\Database\Seeder;
use App\Category1;
use App\Company1;
use App\Stock;
use App\Solditem;

class PosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Company1 = Company1::create([
            'name' => 'Q-soft',
            'phone' => '01715468477',
            'address' => 'Lalmatia',
        ]);


        $Category1 = Category1::create([
            'name' => 'Dress',
        ]);
        $Category2 = Category1::create([
            'name' => 'Food',
        ]);
        $Category3 = Category1::create([
            'name' => 'Drink',
        ]);
        $Category4 = Category1::create([
            'name' => 'Shirt',
        ]);

        $Stock1 = Stock::create([
            'name' => 'Red Shirt',
            'getprice' => '12',
            'sellprice' => '15',
            'quantity' => '10',
            'categoryid' => $Category4->id,
            'companyid' => $Company1->id,
            'barcode' => 'dsadwdassxasd',
        ]);
        $Stock2 = Stock::create([
            'name' => 'Coca Cola',
            'getprice' => '25',
            'sellprice' => '30',
            'quantity' => '7',
            'categoryid' => $Category3->id,
            'companyid' => $Company1->id,
            'barcode' => 'asdsdwrrrqq',
        ]);
        $Stock3 = Stock::create([
            'name' => 'Cake',
            'getprice' => '15',
            'sellprice' => '22',
            'quantity' => '50',
            'categoryid' => $Category2->id,
            'companyid' => $Company1->id,
            'barcode' => '1eersdrrqq',
        ]);
        $Stock4 = Stock::create([
            'name' => 'Pink Dress',
            'getprice' => '1800',
            'sellprice' => '2500',
            'quantity' => '15',
            'categoryid' => $Category1->id,
            'companyid' => $Company1->id,
            'barcode' => '1erererrqq',
        ]);

    }
}
