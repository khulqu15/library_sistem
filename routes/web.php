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

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::resource('admin/books', 'Admin\BooksController');
Route::post('logout', 'AuthController@logout');

Route::get('login', function() {
    return view('pages.login');
});
Route::post('login', 'AuthController@login');

Route::get('admin/smknusa/library/register', function() {
    return view('pages.register');
});
Route::post('admin/smknusa/library/register', 'AuthController@register');


Route::resource('peminjaman', 'User\PeminjamanController');
Route::post('peminjaman/{id}', 'User\PeminjamanController@update');
Route::get('check_peminjaman/{user_id}/{code_transaction}', 'User\PeminjamanController@success');
Route::get('kode/peminjaman/{code}', 'User\PeminjamanController@code');
Route::get('pdf/peminjaman/{code}', 'User\PeminjamanController@pdf');

Route::resource('pengembalian', 'User\PengembalianController');
Route::post('check_pengembalian/{code}', 'User\PengembalianController@pengembalian');
Route::get('success/pengembalian/{code}', 'User\PengembalianController@success');

