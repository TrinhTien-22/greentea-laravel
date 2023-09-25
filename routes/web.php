<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\Menucontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Productcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartdetailController;
use App\Http\Controllers\DetailProduct;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\QuickViewController;

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

Route::get('/', [Homecontroller::class, 'home'])->name('home');
Route::get('home/search', [Homecontroller::class, 'searchproduct'])->name('searchproduct');
Route::get('home/detailproduct/{id}',  [DetailProduct::class, 'detailproduct'])->name('detailproduct');
Route::get('home/quickview/{id}', [QuickViewController::class, 'quickview'])->name('quickview');
Route::get('home/about', [Homecontroller::class, 'aboutget'])->name('about.get');
Route::get('home/contact', [Homecontroller::class, 'contactget'])->name('contact.get');
Route::get('home/menu/{name}', [Homecontroller::class, 'menuhandle'])->name('menu.handle');
Route::middleware(['guest:userhomes'])->group(function () {
    // Các route yêu cầu xác thực bằng guard 'userhomes'
    Route::post('/home/login', [Homecontroller::class, 'login'])->name('homelogin');
    Route::post('/home/register', [Homecontroller::class, 'register'])->name('homeregister');
});
Route::get('home/detailproduct/comment/{id}', [DetailProduct::class, 'showcomment'])->name('showcomment');
Route::middleware(['auth:userhomes'])->group(function () {

    Route::get('home/cartdetail/{user}/order', [CartdetailController::class, 'order'])->name('order');

    Route::delete('home/deleteitemcart/{id}', [CartController::class, 'deleteitemcart'])->name('delete.itemcart');

    Route::post('home/cartdetail/{id}/{active}', [CartdetailController::class, 'activequantity'])->name('active.quantity');
    Route::get('home/cartdetail/{user}', [CartdetailController::class, 'viewcartdetail'])->name('view.cartdetail');
    Route::post('home/cartdetail/{user}', [CartdetailController::class, 'theorder'])->name('view.cartdetailpost');

    Route::post('home/cartaddquick/{id}', [QuickViewController::class, 'cartaddquick'])->name('cart.addquick');
    Route::post('home/cartadd/{id}', [CartController::class, 'cartadd'])->name('cart.add');
    Route::get('home/cartget/{user}', [CartController::class, 'cartget'])->name('cart.get');

    Route::post('home/detailproduct/comment/{id}', [DetailProduct::class, 'createcomment'])->name('createcomment');

    Route::post('home/logout', [Homecontroller::class, 'logout'])->name('homelogout');
    Route::post('home/changepassword', [Homecontroller::class, 'changepassword'])->name('changepassword');
});




Route::get('/dashboard', [DashboardController::class, 'quantitydashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('dashboard',  [DashboardController::class, 'quantitydashboard'])->name('quantitydashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard/update', [Menucontroller::class, 'update'])->name('menu.update');
    Route::get('dashboard/menu', [Menucontroller::class, 'showmenu'])->name('showmenu');

    Route::post('dashboard/menu/add', [Menucontroller::class, 'store'])->name('storedashboard');
    Route::get('dashboard/menu/add', [Menucontroller::class, 'create'])->name('add');
    Route::delete('dashboard/menu/delete/{id}', [Menucontroller::class, 'delete'])->name('menu.delete');
    Route::get('dashboard/menu/update/{id}', [Menucontroller::class, 'update'])->name('menu.update');
    Route::put('dashboard/menu/update/{id}', [Menucontroller::class, 'updatestore'])->name('menu.update.form');

    Route::get('dashboard/products/show', [Productcontroller::class, 'showproduct'])->name('showproduct');
    Route::get('dashboard/products/add', [Productcontroller::class, 'showadd'])->name('showadd');
    Route::post('dashboard/products/add', [Productcontroller::class, 'addproduct'])->name('addproduct');
    Route::get('dashboard/products/update/{id}', [Productcontroller::class, 'showupdate'])->name('showupdate');
    Route::post('dashboard/products/update/{id}', [Productcontroller::class, 'updateproduct'])->name('updateproduct');
    Route::delete('dashboard/products/delete/{id}', [Productcontroller::class, 'deleteproduct'])->name('deleteproduct');
});

require __DIR__ . '/auth.php';
