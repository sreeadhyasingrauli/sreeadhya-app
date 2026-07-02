<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PurchaseOrderService;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BillingDashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PasswordController;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/companies', [CompanyController::class, 'index'])->name('dashboard.companies');
    Route::get('/dashboard/customers', [CustomerController::class, 'index'])->name('dashboard.customers');
    Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');
    Route::get('/dashboard/offers', [OfferController::class, 'index'])->name('dashboard.offers');
     Route::get('/dashboard/purchase-orders', [PurchaseOrderController::class, 'index'])->name('dashboard.purchase-orders');
    Route::get('/dashboard/invoices', [InvoiceController::class, 'index'])->name('dashboard.invoices');
    //Route::get('/dashboard/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/dashboard/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::post('/change-password', [PasswordController::class, 'update'])->name('password.update');
    
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])
        ->name('profile.settings.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])
        ->name('profile.settings.update');
    
});

//Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 


 


Route::get('/dashboard/invoices', [InvoiceController::class, 'index'])->name('dashboard.invoices');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

//Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


 


Route::resource('parts', PartController::class);
Route::resource('products', ProductController::class);
Route::resource('companies', CompanyController::class);
Route::resource('customers', CustomerController::class);
Route::resource('offers', OfferController::class);
Route::resource('quotes', QuoteController::class);
Route::resource('/purchase-orders', PurchaseOrderController::class);
Route::get('/purchase-orders/accept/{id}', [PurchaseOrderController::class, 'generateOrderAcceptance']) ->name('purchase-orders.order-acceptance');
Route::get('/offer/{id}', [OfferController::class, 'generatePdf']) ->name('offer');
//Route::get('/invoices/{id}/download', [InvoiceController::class, 'download']);
//Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::resource('invoices', InvoiceController::class);
Route::get('/invoice/{id}/preview', [InvoiceController::class, 'preview'])->name('invoice.preview');
//Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'download'])      ->name('invoices.pdf'); // <-- Make sure this matches exactly
//Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::get('/offers/download/{id}', [OfferController::class, 'download']) ->name('offers.download');
Route::post('/invoices/{invoice}/payments', [PaymentController::class, 'store'])->name('payments.store');