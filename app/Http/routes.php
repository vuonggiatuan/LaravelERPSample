<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('foo/bar',function(){
  return 'Hello World';
});
Route::get('ID/{id}',function($id){
  echo 'ID:'.$id;
});
Route::group(array('middleware' => 'auth'), function () {
  Route::get('/', 'PagesController@index');
  Route::get('home', 'PagesController@index');

  Route::get('/accountingrecord/index','AccountingRecordController@index');
  Route::get('/accountingrecord/detail/{id?}','AccountingRecordController@detail');
  Route::get('/accountingrecord/submit','AccountingRecordController@submit');
  Route::post('/accountingrecord/submit','AccountingRecordController@store');
  //
  Route::get('/accountingentry','AccountingEntryController@index');
  Route::get('/accountingentry/detail/{id?}','AccountingEntryController@detail');
  Route::get('/accountingentry/create','AccountingEntryController@create');
  Route::post('/accountingentry/create','AccountingEntryController@store');

  Route::get('/purchase','PurchaseController@index');
  Route::get('/purchase/detail/{id?}','PurchaseController@detail');
  Route::get('/purchase/create','PurchaseController@create');
  Route::post('/purchase/create','PurchaseController@store');
  Route::get('/purchase/createstockmove/{id?}','PurchaseController@createStockMove');
  Route::get('/purchase/createjournal/{id?}','PurchaseController@createJournal');

  Route::get('/inventory/stockmove','InventoryController@stockmove');
  Route::get('/inventory/stockmovedetail/{id?}','InventoryController@stockmovedetail');
  Route::get('/inventory/stockmovestatus/{id?}/{status?}','InventoryController@stockmovestatus');
  Route::get('/inventory/storage','StorageController@index');
  Route::get('inventory/newstorage','StorageController@create');
  Route::post('/inventory/newstorage','StorageController@store');
  Route::get('/inventory/storagedetail/{id?}','StorageController@detail');

  Route::get('/product','ProductController@index');
  Route::get('/product/detail/{id?}','ProductController@detail');
  Route::get('/product/create','ProductController@create');
  Route::post('/product/create','ProductController@store');
  Route::get('/product/orderlist','ProductController@orderlist');
  Route::get('/product/neworder','ProductController@createorder');
  Route::post('/product/neworder','ProductController@storeorder');
  Route::get('/product/orderdetail/{id?}','ProductController@orderdetail');
  Route::get('/product/ordercostanalysis/{id?}','ProductController@ordercostanalysis');
  Route::get('/bom','BomController@index');
  Route::get('/bom/detail/{id?}','BomController@detail');
  Route::get('/bom/create','BomController@create');
  Route::post('/bom/create','BomController@store');
  Route::post('bom/newcomponent','BomController@newcomponent');
  Route::get('/product/createprocess/{id?}','ProductController@createprocess');
  Route::post('/product/createprocess/{id?}','ProductController@storeprocess');
  Route::get('/product/createstockmove/{id?}','ProductController@createStockMove');
  Route::get('/product/createjournal/{id?}','ProductController@createJournal');
  Route::get('/product/manufactureputin/{id?}','ProductController@manufacturePutin');
  Route::get('/product/newmanufactureprocess/{id?}','ProductController@createmanufactureprocess');
  Route::post('/product/newmanufactureprocess/{id?}','ProductController@storemanufactureprocess');

  Route::get('/accountingledger/ledgerlist','AccountingLedgerController@ledgerlist');
  Route::get('/accountingledger/deptlist','AccountingLedgerController@deptlist');
  Route::get('/accountingledger/budgetlist','AccountingLedgerController@budgetlist');
  Route::get('/accountingledger/createbudget','AccountingLedgerController@createbudget');
  Route::post('/accountingledger/createbudget','AccountingLedgerController@storebudget');

  Route::get('/sale','SaleController@index');
  Route::get('/sale/detail/{id?}','SaleController@detail');
  Route::get('/sale/create','SaleController@create');
  Route::post('/sale/create','SaleController@store');
  Route::get('/sale/createstockmove/{id?}','SaleController@createStockMove');
  Route::get('/sale/createjournal/{id?}','SaleController@createJournal');

  Route::get('/customer','CustomerController@index');
  Route::get('/customer/create','CustomerController@create');
  Route::post('/customer/create','CustomerController@store');

  Route::get('/bi/sale','BIController@sale');
  Route::get('/bi/purchase','BIController@purchase');
  Route::get('/bi/accounting','BIController@accounting');
  Route::get('/bi/manufacture','BIController@manufacture');
  Route::get('/bi/storage','BIController@storage');
  Route::get('/bi/product','BIController@product');
  Route::get('/bi/productdetail/{id?}','BIController@productdetail');

  Route::get('users', 'UserController@index');
  Route::get('users/{id?}/edit','UserController@edit');
  Route::post('users/{id?}/edit','UserController@update');

  Route::get('roles','RolesController@index');
  Route::get('roles/create',"RolesController@create");
  Route::post('roles/create','RolesController@store');
});

Route::get('/about','PagesController@about');
Route::get('/contact','PagesController@contact');



Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');
Route::get('users/logout', 'Auth\AuthController@getLogout');

Route::auth();

Route::get('/home', 'HomeController@index');
