
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
Use App\stokbarang;
Use App\pembelian;


Route::group(['middleware' => 'auth'] , function(){
        Route::get('/', function () {
            return view('index');
        });

        Route::resource('Kas', 'KasController');

        Route::get('/tambah-kas', function () {
            return view('tambah-kas');
        });

        Route::get('/tambah-stock', function () {
            return view('tambah-stock');
        });

        Route::get('/tambah-sup', function () {
            return view('tambah-sup');
        });

        Route::resource('Supplier', 'SupplierController');

        Route::resource('stok', 'stokController');
        Route::get('/table-datasupplier', 'SupplierController@tampildatasupplier');
        Route::get('/table-stok', 'stokController@tampildatastok');
        Route::get('/table-datastockbarang', 'stokController@tampildatastok');
        route::delete('/table-datastockbarang/{id}','PenjualanController@destroy')->name('delete');


        Route::resource('penjualan', 'PenjualanController');
        Route::get('/table-datapenjualan', 'PenjualanController@index');
        Route::get('/tambah-jual', 'PenjualanController@create');
        Route::post('/tambah-jual', 'PenjualanController@store')->name('addpenjualan');
        route::get('/Penjualan/delete/{id}', 'PenjualanController@destroy');
        route::get('/table-datapenjualan/edit/{id}','PenjualanController@edit')->name('penjualan.edit');
        route::put('/table-datapenjualan/update/{id}','PenjualanController@update')->name('penjualan.update');



        // pembelian
        Route::get('/pembelian', 'PembelianController@index');
        Route::get('/tambah-beli', 'PembelianController@create');
        Route::post('/tambah-beli', 'PembelianController@store')->name('pembeli.store');
        route::delete('/Pembelian/delete/{id}', 'PembelianController@destroy')->name('pembeli.destroy');
        route::get('/pembelian/edit/{id}','PembelianController@edit')->name('pembeli.edit');
        route::put('/pembelian/update/{id}','PembelianController@update')->name('pembeli.update');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
