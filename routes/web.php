<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('User.home'); 
// Route::get('/gantipassword', [HomeController::class, 'gantipassword'])->name('Admin.home'); 

Route::prefix('admin')->middleware('role:admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/gantipassword', 'HomeController@gantipassword')->name('admin.gantipassword');


    Route::get('/index', 'DataController@index')->name('admin.data.index');
    Route::get('/contact', 'DataController@contact')->name('admin.data.contact');
    Route::post('/home/import', 'DataController@import_excel')->name('admin.data.import');
    Route::get('/index', 'DataController@index')->name('admin.data.index');
    Route::get('/edit/{data}', 'DataController@edit')->name('admin.data.edit');
    Route::patch('/update/{id}', 'DataController@update')->name('admin.data.update');
    Route::delete('/index/{data}', 'DataController@destroy')->name('admin.data.delete');


    Route::get('/info', 'InfoController@info')->name('admin.info.info');
    Route::post('/info', 'InfoController@store')->name('admin.info.store');
    Route::get('/info/show', 'InfoController@show')->name('admin.info.show');
    Route::delete('/info/show/{info}', 'InfoController@destroy')->name('admin.info.delete');

 
});

Route::prefix('mahasiswa')->middleware('role:user')->namespace('User')->group(function ()  {

    Route::get('/', 'HomeController@index')->name('user.home');
    Route::get('/create', 'UsulanController@create')->name('user.create');
    Route::post('/create', 'UsulanController@store')->name('user.create.store');
    Route::get('/list_pkm', 'UsulanController@list_pkm')->name('user.create.list_pkm');
    Route::get('/list', 'UsulanController@list')->name('user.list');

    Route::get('/contact', 'ContactController@contact')->name('user.contact.contact');
    Route::post('/contact', 'ContactController@store')->name('user.contact.store');


});

