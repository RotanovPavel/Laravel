<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Brand;

Route::get('/', function () {
    $brands = Brand::all();
    $featuredItems = DB::table('items')->where('relevance', '=', 'featured')->get();
    $latestItems = DB::table('items')->where('relevance', '=', 'latest')->get();
    return view('index',compact('brands', 'featuredItems', 'latestItems'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'HomeController@admin')->middleware(['admin','auth']);
Route::resource('brands', 'BrandController')->middleware(['admin','auth']);
Route::resource('items', 'ItemController')->middleware(['admin','auth']);
Route::resource('users', 'UserController')->middleware('auth');
Route::resource('discount_items', 'DiscountItemController')->middleware(['admin','auth']);

Route::get('itemList/{id}', 'BrandController@itemList')->name('brands.itemList');
Route::get('/test', function (){
    return view('test');
});
