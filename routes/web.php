<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', function () {
//    return response()->json(['name' =>'yyy']);
//});
Route::get('/about', function () {
    return view('about', ['id' =>request('id'), 'user' => []]);
})->where('id', '[0-9]+');

Route::get('/profile/{id}/{test?}', function ($id,$test = null) {
    $user = [
        'name' => 'Ani'
    ];
    return view('about', [
        'id' =>$id,
        'user' => $user
    ]);
})->middleware(['auth'])
    ->where(['id'=> '[0-9]+', 'test'=> '[a-z]+'])
    ->name('profile');

Route::get('/test', 'Web\UserController');
Route::get('/test1/{id}', 'Web\UserController@index');
/*Route::resource('res', 'Web\ResController');
Route::resource('res.sub', 'Web\ResSubController');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')
   ->namespace('Web')
   ->group(function (){
   Route::get('/products', 'ProductController@index');
   Route::get('/products/create', 'ProductController@create');
   Route::get('/products/{id}', 'ProductController@show')
        ->where(['id'=> '[0-9]+']);
   Route::post('/products/store', 'ProductController@store');
    Route::get('/products/edit/{id}', 'ProductController@edit');
    Route::post('/products/update/{id}', 'ProductController@update');
    Route::delete('/products/destroy/{id}', 'ProductController@destroy');
});
