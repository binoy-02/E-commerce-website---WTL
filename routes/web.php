<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('home.index');
// });

route::get('/',[HomeController::class,'home']);

route::get('admin/dashboard', [HomeController::class, 'index'])
->middleware(['auth','admin']);

route::get('view_category', [AdminController::class, 'view_category'])
->middleware(['auth','admin']);

route::post('add_category', [AdminController::class, 'add_category'])
->middleware(['auth','admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])
->middleware(['auth','admin']);

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
->middleware(['auth','admin']);

route::post('update_category/{id}', [AdminController::class, 'update_category'])
->middleware(['auth','admin']);

route::get('add_product', [AdminController::class, 'add_product'])
->middleware(['auth','admin']);



route::post('upload_product', [AdminController::class, 'upload_product'])
->middleware(['auth','admin']);

route::get('view_product', [AdminController::class, 'view_product'])
->middleware(['auth','admin']);

route::get('products_create', [UserController::class, 'create']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.index');    
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
});



require __DIR__.'/auth.php';


route::get('delete_product/{id}', [AdminController::class, 'delete_product'])
->middleware(['auth','admin']);