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
use App\Http\Controllers\VendorController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\InventoryController;



Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/companies', [CompanyController::class, 'index'])->name('dashboard.companies');
    Route::get('/dashboard/customers', [CustomerController::class, 'index'])->name('dashboard.customers');
    Route::get('/dashboard/vendors', [VendorController::class, 'index'])->name('dashboard.vendors');
    Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');
    Route::get('/dashboard/offers', [OfferController::class, 'index'])->name('dashboard.offers');
    Route::get('/dashboard/orders', [OrderController::class, 'index'])->name('dashboard.orders');
     Route::get('/dashboard/purchase-orders', [PurchaseOrderController::class, 'index'])->name('dashboard.purchase-orders');
    Route::get('/dashboard/invoices', [InvoiceController::class, 'index'])->name('dashboard.invoices');
      Route::get('/dashboard/challans', [ChallanController::class, 'index'])->name('dashboard.challans');
       Route::get('/dashboard/inventory', [InventoryController::class, 'index'])->name('dashboard.inventory');
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
Route::resource('vendors', VendorController::class);
Route::resource('offers', OfferController::class);
Route::resource('orders', OrderController::class);
Route::resource('quotes', QuoteController::class);
Route::resource('challans', ChallanController::class);
Route::resource('stock', StockController::class);
Route::resource('/purchase-orders', PurchaseOrderController::class);
Route::get('/purchase-orders/accept/{id}', [PurchaseOrderController::class, 'generateOrderAcceptance']) ->name('purchase-orders.purchase-order');
Route::get('/offer/{id}', [OfferController::class, 'generatePdf']) ->name('offer');
Route::get('/invoices/{id}/download', [InvoiceController::class, 'download']);
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::resource('invoices', InvoiceController::class);
Route::get('/invoice/{id}/preview', [InvoiceController::class, 'preview'])->name('invoice.preview');
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'download'])->name('invoices.pdf'); // <-- Make sure this matches exactly
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::get('/offers/download/{id}', [OfferController::class, 'download']) ->name('offers.download');
Route::post('/invoices/{invoice}/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::post('/stock/update', [StockController::class, 'updateStock']);
Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/orders/{order:id}', [OrderController::class, 'generateOrderAcceptance']) ->name('orders.order-acceptance');
// Route to display the form / list (Triggered via browser/GET)
//Route::get('/challans', [ChallanController::class, 'index'])->name('challans.index');

// Route to handle data submission (Triggered via Form/POST)
//Route::post('/challans', [ChallanController::class, 'store'])->name('challans.store');
Route::get('/challans/{id}/pdf', [ChallanController::class, 'download'])->name('challans.pdf');;
Route::get('/challan/download/{id}', [ChallanController::class, 'generateChallan'])->name('challan.download');
Route::get('/products/{id}/add-stock', [StockController::class, 'addStock'])->name('stock.addStock');
Route::get('/products/{id}/remove-stock', [StockController::class, 'removeStock'])->name('stock.removeStock');
Route::get('/products/{id}/restock', [StockController::class, 'restock'])->name('stock.restock');
Route::post('/products/{id}/checkout', [StockController::class, 'checkout'])->name('stock.checkout');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::post('/inventory/product', [InventoryController::class, 'storeProduct'])->name('inventory.storeProduct');
Route::post('/inventory/product/{id}/adjust', [InventoryController::class, 'adjustStock'])->name('inventory.adjustStock');
Route::get('/stock/report/pdf', [ProductController::class, 'downloadPdf'])->name('stock.pdf');
Route::post('/stock/{product}/stock-in', [StockController::class, 'stockIn'])->name('stock.stockIn');
Route::post('/stock/{product}/stock-out', [StockController::class, 'stockOut'])->name('stock.stockOut');