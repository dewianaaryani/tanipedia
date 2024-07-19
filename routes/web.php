<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\FarmController as AdminFarmController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\InformationController as AdminInformationController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\VillageController as AdminVillageController;
use App\Http\Controllers\Admin\SubdistrictController as AdminSubdistrictController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can postRegister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('pages.home.index');
// })->name('welcome');


Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/regist', [LoginController::class, 'regist'])->name('regist');
Route::post('/postRegist', [LoginController::class, 'postRegist'])->name('postRegist');

Route::post('/postSubdistrict', [PageController::class, 'postSubdistrict'])->name('postSubdistrict');
Route::get('/hasSubdistrict/{id}', [PageController::class, 'hasSubdistrict'])->name('hasSubdistrict');
Route::post('/postVillage', [PageController::class, 'postVillage'])->name('postVillage');
Route::get('/hasVillage/{id}', [PageController::class, 'hasVillage'])->name('hasVillage');
Route::get('/information/{id}', [PageController::class, 'information'])->name('information');
Route::get('/partner-detail/{id}', [PageController::class, 'partnerDetail'])->name('partnerDetail');

Route::get('/search-code', [PageController::class, 'searchFarm'])->name('search-code');

Route::post('/sendMessage', [PageController::class, 'sendMessage'])->name('sendMessage');

Route::get('/news/{id}', function() {
    return view('pages.news.detail');
})->name('news.detail');

Route::get('/partner/{id}', function(){
    return view('pages.partner.index');
})->name('partner.index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('/', [PageController::class, 'index'])->name('welcome');

    Route::prefix('my-farm')->name('my-farm')->group(function () {
        Route::get('/', [FarmController::class, 'index']);
        Route::post('/store',[FarmController::class,'store'])->name('.store');
        Route::get('/register', [FarmController::class, 'register'])->name('.register');
        Route::get('/postRegister', [FarmController::class, 'postRegister'])->name('.postRegister');
        Route::get('/data', [FarmController::class, 'data'])->name('.data');
        Route::post('/storeProduct',[FarmController::class,'storeProduct'])->name('.storeProduct');
        
        
    });
    Route::delete('farms/{farmId}/products/{productId}', [FarmController::class, 'destroyProduct'])
     ->name('farms.products.destroy');
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {  
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('/admin/users', UserController::class);
    
    // Route::name('admin.')->group(function () {
    //     Route::resource('admin/farms', AdminFarmController::class);
    // });
    Route::prefix('admin')->name('admin.')->group(function () {
        
        Route::resource('/farms', AdminFarmController::class);
        Route::resource('/products', AdminProductController::class);
        Route::resource('/informations', AdminInformationController::class);
        Route::resource('/messages', AdminMessageController::class);
        Route::resource('/subdistricts', AdminSubdistrictController::class);
        Route::resource('/villages', AdminVillageController::class);
        Route::get('searchSubdistrict', [AdminSubdistrictController::class, 'searchSubdistrict'])->name('searchSubdistrict');
    });
});
