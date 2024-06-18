<?php

use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesDetailsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;

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

Route::get('/', function () {
    if(Auth::check()){
    return view('home');
}else{
    return view('auth.login');
}
});

Route::resource('/Invoices', InvoicesController::class);
Route::get('/sections/{id}', [InvoicesController::class,'getProducts']);
Route::resource('/sections', SectionsController::class);
Route::resource('/products', ProductController::class);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'sectionGet']);
Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');;
Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);



// Authintication
Auth::routes();
// Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All Pages $page
Route::get('/{page}', [AdminController::class,'index']);


