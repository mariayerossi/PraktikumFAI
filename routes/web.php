<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ItemSeller;
use App\Http\Controllers\LoginUser;
use App\Http\Middleware\CekAkses;
use App\Http\Middleware\CekAksesAdmin;
use App\Http\Middleware\CekLoginRegister;
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

Route::get('/',[Controller::class, "home"]);
Route::get('/membership',[Controller::class, "member"])->middleware([CekAkses::class]);
Route::get('/aboutus',[Controller::class, "about"]);
Route::get('/login',[Controller::class, "login"])->middleware([CekLoginRegister::class]);
Route::get('/register',[Controller::class, "register"])->middleware([CekLoginRegister::class]);

Route::get('/addToCart',[Controller::class, "addtocart"]);
Route::get('/cart',[Controller::class, "cart"])->middleware([CekAkses::class]);
Route::get('/deleteCart',[Controller::class, "deletecart"]);

Route::get('/checkout',[Controller::class, "checkout"]);
Route::get('/history',[Controller::class, "history"])->middleware([CekAkses::class]);

Route::get('/dashboard',[Controller::class, "dashboard"])->middleware([CekAksesAdmin::class]);
Route::get('/listSeller',[Controller::class, "listSeller"])->middleware([CekAksesAdmin::class]);
Route::get('/listMember',[Controller::class, "listMember"])->middleware([CekAksesAdmin::class]);

Route::post('/register',[LoginUser::class, "registerUser"]);
Route::post('/login',[LoginUser::class, "loginUser"]);
Route::get('/logout',[LoginUser::class, "logoutUser"]);
Route::get('/profil',[LoginUser::class, "profil"]);
Route::get('/editProfil',[LoginUser::class, "editProfil"]);
Route::post('/editProfil',[LoginUser::class, "edit"]);

Route::get('/editMember',[LoginUser::class, "editMember"]);
Route::post('/editMember',[LoginUser::class, "editMbr"]);

Route::get('/lockMember',[LoginUser::class, "lockMember"]);
Route::get('/unlockMember',[LoginUser::class, "unlockMember"]);

Route::get('/item',[ItemSeller::class, "item"])->middleware([CekAkses::class]);
Route::get('/addItem',[ItemSeller::class, "addItem"]);
Route::post('/addItem',[ItemSeller::class, "add"]);
Route::get('/listNovel',[ItemSeller::class, "listNovel"])->middleware([CekAksesAdmin::class]);
Route::get('/editNovel',[ItemSeller::class, "editNovel"]);
Route::post('/editNovel',[ItemSeller::class, "edit"]);

Route::get('/items/{id}/edit',[ItemSeller::class, "editNovel2"]);
Route::post('/editNovel2',[ItemSeller::class, "edit2"]);
Route::get('/items/{id}/detail',[ItemSeller::class, "detail"]);
Route::get('/items/{id}/delete',[ItemSeller::class, "TanyaDelete"]);
Route::post('/deleteNovel',[ItemSeller::class, "delete"]);

Route::get('/topup',[LoginUser::class, "topup"]);
Route::post('/topupSaldo',[LoginUser::class, "topupSaldo"]);

Route::post('/search',[ItemSeller::class, "search"]);
Route::post('/searchHistory',[Controller::class, "search"]);

Route::get('/gantiProfil',[LoginUser::class, "gantiProfil"]);
Route::post('/ganti',[LoginUser::class, "ganti"]);

Route::get('/laporan',[Controller::class, "laporan"])->middleware([CekAksesAdmin::class]);
Route::post('/rangeTanggal',[Controller::class, "rangeTanggal"]);