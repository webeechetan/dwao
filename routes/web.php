<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\WebSiteController;
use App\Http\Controllers\SubCategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
/*--------------------------------- Admin Routes ---------------------------------*/

/*--------------------------------- Auth Routes ---------------------------------*/

Route::get('/admin/login', [AuthController::class, 'index'])->name('login.view')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::group(['middleware' => 'auth','prefix'=>'/admin'], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /*-------------------------------

     ______________
    |  Resources  |
    ______________
        1: Sub Category
        2: Category
        3: blogs
    --------------------------------*/

    Route::resources([
        '/category' => CategoryController::class,
        '/blog' => BlogController::class,
        '/subCategory' => SubCategoryController::class,
        '/user' => UserController::class,
    ]);

    /*--------------------------------- File Manager ---------------------------------*/

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::get('/get-subcategories/{id?}', [BlogController::class, 'getSubCategories'])->name('get.subcategories');
 
    /*----------------------------------- Meta ---------------------------------*/

    Route::get('/meta', [MetaController::class, 'index'])->name('meta.index');
    Route::get('/meta/{meta}', [MetaController::class, 'edit'])->name('meta.edit');
    Route::put('meta/{meta}', [MetaController::class, 'update'])->name('meta.update');

});

/*--------------------------------- Website Routes ---------------------------------*/


Route::get('/blog/{title}',[WebSiteController::class,'viewBlog'])->name('blog.view');
Route::get('/{catId?}/{subCatId?}',[WebSiteController::class,'viewIndex'])->name('index');
Route::get('/about-us',[WebSiteController::class,'viewAbout']);





