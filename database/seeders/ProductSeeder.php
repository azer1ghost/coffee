<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
           [
               'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/hub-image-coffee-e732616.jpg?quality=90&resize=504,458',
               'name'  => 'Affogato',
               'price' => random_int(3, 25),
               'description' => 'This is a term that literally means \'drowned\'. It is the description of a shot of separately served espresso that is later poured over a the top of a scoop of vanilla ice cream or gelato. This beverage is usually served in a short drink glass and is a Italian desert favourite. Popular Affogatos include Vanilla Affogato, Mocha Affogato, and Peppermint Affogato.'
           ],
           [
               'image' => 'https://static3.depositphotos.com/1001651/137/i/600/depositphotos_1376093-stock-photo-cofee-cup.jpg',
               'name'  => 'Americano',
               'price' => random_int(3, 25),
               'description' => 'Also known as \'Lungo\' or \'Long Black\' and made by diluting 1-2 shots of espresso with hot water in order to approximate the texture, flavor and body of an American-style drip coffee. Said to have been originally devised as a sort of insult to Americans who wanted their Italian espresso diluted.'
           ],
           [
               'image' => 'https://static3.depositphotos.com/1001651/137/i/600/depositphotos_1376093-stock-photo-cofee-cup.jpg',
               'name'  => 'Caffe Mocha',
               'price' => random_int(3, 25),
               'description' => 'A combination of chocolate syrup and a shot of espresso, topped with steamed milk and a layer of micro-foam. Finished with a sprinkled of chocolate.'
           ],
           [
               'image' => 'https://static3.depositphotos.com/1001651/137/i/600/depositphotos_1376093-stock-photo-cofee-cup.jpg',
               'name'  => 'Cappuccino Chiaro',
               'price' => random_int(3, 25),
               'description' => '(AKA Wet or Light cappuccino): Cappuccino prepared with more milk than usual.'
           ],

        ];
        DB::table('products')->insert($products);
    }
}
