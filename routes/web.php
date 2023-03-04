<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    $products = array(
      array(
          'id'=>1,
          'category'=>'Jacket',
          'name' => 'Mens Winter Leathers Jackets',
          'image'=>'products/Jacket-1.jpg',
          'rating'=>4,
          'price'=>75.00,
          'discount'=>20.50
      ),
      array(
            'id'=>2,
            'category'=>'SHIRT',
            'name' => 'Pure Garment Dyed Cotton Shirt',
            'image'=>'products/shirt-1.jpg',
            'rating'=>3,
            'price'=>65.00,
            'discount'=>20.50
      ),
      array(
            'id'=>3,
            'category'=>'JACKET',
            'name' => 'MEN Yarn Fleece Full-Zip Jacket',
            'image'=>'products/jacket-5.jpg',
            'rating'=>5,
            'price'=>70.00,
            'discount'=>12.00
      ),
      array(
            'id'=>4,
            'category'=>'SKIRT',
            'name' => 'Black Floral Wrap Midi Skirt',
            'image'=>'products/clothes-3.jpg',
            'rating'=>5,
            'price'=>35.00,
            'discount'=>10.00
      ),
      array(
            'id'=>5,
            'category'=>'PARTY WEAR',
            'name' => 'Women Party Wear Shoes',
            'image'=>'products/party-wear-1.jpg',
            'rating'=>4,
            'price'=>35.00,
            'discount'=>10.00
      ),
      array(
            'id'=>6,
            'category'=>'CASUAL',
            'name' => 'Casual Men\'s Brown Shoes',
            'image'=>'products/shoe-2.jpg',
            'rating'=>4,
            'price'=>105.00,
            'discount'=>0
      ),
      array(
            'id'=>7,
            'category'=>'WATCHES',
            'name' => 'Pocket Watch Leather Pouch',
            'image'=>'products/watch-3.jpg',
            'rating'=>4,
            'price'=>175.00,
            'discount'=>25
      ),
      array(
            'id'=>8,
            'category'=>'WATCHES',
            'name' => 'Smart Watche Vital Plus',
            'image'=>'products/watch-1.jpg',
            'rating'=>3,
            'price'=>120.00,
            'discount'=>10
      ),
    );
    $newArrival = array(
        array(
          'id'=>1,
          'category'=>'Jacket',
          'name' => 'Mens Winter Leathers Jackets',
          'image'=>'products/Jacket-1.jpg',
          'rating'=>4,
          'price'=>75.00,
          'discount'=>20.50
      ),
      array(
            'id'=>2,
            'category'=>'SHIRT',
            'name' => 'Pure Garment Dyed Cotton Shirt',
            'image'=>'products/shirt-1.jpg',
            'rating'=>3,
            'price'=>65.00,
            'discount'=>20.50
      ),
      array(
            'id'=>3,
            'category'=>'JACKET',
            'name' => 'MEN Yarn Fleece Full-Zip Jacket',
            'image'=>'products/jacket-5.jpg',
            'rating'=>5,
            'price'=>70.00,
            'discount'=>12.00
      ),
      array(
            'id'=>4,
            'category'=>'SKIRT',
            'name' => 'Black Floral Wrap Midi Skirt',
            'image'=>'products/clothes-3.jpg',
            'rating'=>5,
            'price'=>35.00,
            'discount'=>10.00
      )
    );
    $trending = array(
      array(
          'id'=>1,
          'category'=>'Sports',
          'name' => 'Running & Trekking Shoes',
          'image'=>'products/sports-1.jpg',
          'rating'=>4,
          'price'=>94,
          'discount'=>40
      ),
      array(
          'id'=>2,
          'category'=>'Sports',
          'name' => 'Running & Trekking Shoes',
          'image'=>'products/sports-2.jpg',
          'rating'=>4,
          'price'=>115.50,
          'discount'=>40
      ),
      array(
          'id'=>3,
          'category'=>'Party Wear',
          'name' => 'Women Party Wear Shoes',
          'image'=>'products/party-wear-1.jpg',
          'rating'=>4,
          'price'=>215.50,
          'discount'=>70
      ),
      array(
          'id'=>4,
          'category'=>'Sports',
          'name' => 'Running & Trekking Shoes',
          'image'=>'products/sports-3.jpg',
          'rating'=>4,
          'price'=>80.50,
          'discount'=>13
      ),
    );
    $topRated = array(
      array(
          'id'=>1,
          'category'=>'Watch',
          'name' => 'Pocket Watch leather',
          'image'=>'products/watch-3.jpg',
          'rating'=>4,
          'price'=>75,
          'discount'=>15.50
      ),
      array(
          'id'=>2,
          'category'=>'Watch',
          'name' => 'Silver Deer Heart Necklaces',
          'image'=>'products/Jewellery-3.jpg',
          'rating'=>4,
          'price'=>120.65,
          'discount'=>0
      ),
      array(
          'id'=>3,
          'category'=>'Perfume',
          'name' => 'Titan 100 Ml Women',
          'image'=>'products/perfume.jpg',
          'rating'=>4,
          'price'=>49.65,
          'discount'=>5.13
      ),
       array(
          'id'=>4,
          'category'=>'Belt',
          'name' => 'Men\'s Leather Reversed',
          'image'=>'products/belt.jpg',
          'rating'=>4,
          'price'=>31.05,
          'discount'=>9.00
      ),
    );
    return view('home',compact('products','newArrival','trending','topRated'));
});

