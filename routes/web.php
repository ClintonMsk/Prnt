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

Route::get('/', function () {
    return view('welcome');
});


Route::get('Install/', function () {
    return Artisan::call('migrate', ["--force"=> true ]);
});



Route::group(['middleware'=>['checklogin']],function() {
    Route::get('BackEnd', 'MainController@Home');
    Route::get('BackEnd/AddCard', 'CardBEController@Add');
    Route::get('BackEnd/EditCard/{code}', 'CardBEController@Edit');
    Route::get('BackEnd/ListType', 'CardBEController@TypeList');
    Route::get('BackEnd/ListCard/{product}/{orderby}/{sortby}/{limit}/{page}/{search?}', 'CardBEController@List');

    Route::get('BackEnd/AddGift', 'GiftBEController@Add');

    Route::post('PostGroup', 'CardBEController@PostGroup');
    Route::post('PostCard', 'CardBEController@Post');
    Route::post('UpdateType', 'CardBEController@UpdateType');
    Route::post('UploadImageCard', 'CardBEController@UploadImageCard');
    Route::post('DeleteImageCard', 'CardBEController@DeleteImageCard');
    Route::post('UpdateCard', 'CardBEController@Update');
    Route::post('Delete', 'FormController@Delete');

});

Route::get('Loginform', 'LoginController@index');
Route::post('Login', 'LoginController@Login');
Route::get('Logout', 'LoginController@Logout');

/*FrontLoad*/
Route::get('HomePageSet', 'FEController@Homepage');
Route::get('ListPageSet/{product}/{orderby}/{sortby}/{limit}/{page}/{search?}', 'FEController@List');
Route::get('ListPageSets/{product}/{orderby}/{sortby}/{limit}/{page}/{search?}', 'FEController@Lists');
Route::get('DetailPageSet/{code}', 'FEController@Detail');
Route::get('EnvelopePageSet', 'FEController@Envelope');
Route::get('PromotionPageSet', 'FEController@Promotion');
Route::get('AboutPageSet', 'FEController@About');
/*FrontLoad*/
Auth::routes();




/*FrontEnd*/
Route::get('About', 'FEController@RouteSetAbout');
Route::get('Detail/{code}', 'FEController@RouteSetDetail');
Route::get('List/{product}/{orderby}/{sortby}/{limit}/{page}/{search?}', 'FEController@RouteSetList');
Route::get('', 'FEController@RouteSet');
Route::get('{page}', 'FEController@RouteSet');

/*FrontEnd*/


/*Honda*/



Route::get('/home', 'HomeController@index')->name('home');

