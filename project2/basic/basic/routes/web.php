<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CostumerController;
use App\Http\Controllers\Pos\DefaultControlller;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\SuppliersController;
use App\Http\Controllers\Pos\UnitController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});

//Group Middlewear if u are not logged in
Route::middleware(['auth'])->group(function(){ 

        // Admin All Route 
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/logout', 'destroy')->name('admin.logout');
            Route::get('/admin/profile', 'Profile')->name('admin.profile');
            Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
            Route::post('/store/profile', 'StoreProfile')->name('store.profile');

            Route::get('/change/password', 'ChangePassword')->name('change.password');
            Route::post('/update/password', 'UpdatePassword')->name('update.password');
            
        });
        //Supplier All Route
        Route::controller(SuppliersController::class)->group(function () {
            Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
            Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
            Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
            Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
            Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
            Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
            
        });

        //Costumer All Route
        Route::controller(CostumerController::class)->group(function () {
            Route::get('/costumer/all', 'CostumerAll')->name('costumer.all');
            Route::get('/costumer/add', 'CostumerAdd')->name('costumer.add');
            Route::get('/costumer/edit/{id}', 'CostumerEdit')->name('costumer.edit');
            Route::post('/costumer/store', 'CostumerStore')->name('costumer.store');
            Route::get('/costumer/delete/{id}', 'CostumerDelete')->name('costumer.delete');
            Route::post('/costumer/update', 'CostumerUpdate')->name('costumer.update');
            Route::get('/costumer/credit', 'CostumerCredit')->name('costumer.credit');
            Route::get('/costumer/print', 'CostumerPrint')->name('costumer.credit.print');
            Route::get('/costumer/edit/invoice/{invoice_id}', 'CostumerEditInvoice')->name('costumer.edit.invoice');
            Route::post('/costumer/update/invoice/{invoice_id}', 'CostumerUpdateInvoice')->name('costumer.update.invoice');
            Route::get('/costumer/view/details/{invoice_id}', 'CostumerDetailsPdf')->name('costumer.invoice.details.pdf');
            Route::get('/costumer/paid/costumer', 'CostumerPaid')->name('costumer.paid');
            Route::get('/costumer/paid/print/pdf', 'CostumerPaidPrintPdf')->name('paid.customer.print.pdf');
            Route::get('/costumer/wise/report', 'CostumerWiseReport')->name('costumer.wise.report');
            Route::get('/costumer/credit/wise/pdf', 'CreditWisePdf')->name('credit.wise.pdf');
            Route::get('/costumer/paid/wise/pdf', 'PaidWisePdf')->name('paid.wise.pdf');
            
        });

        //Unit All Route
        Route::controller(UnitController::class)->group(function () {
            Route::get('/unit/all', 'UnitAll')->name('unit.all');
            Route::get('/unit/add', 'UnitAdd')->name('unit.add');
            Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
            Route::post('/unit/store', 'UnitStore')->name('unit.store');
            Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
            Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
            
        });
        //Category All Route
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/all', 'CategoryAll')->name('category.all');
            Route::get('/category/add', 'CategoryAdd')->name('category.add');
            Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
            Route::post('/category/store', 'CategoryStore')->name('category.store');
            Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
            Route::post('/category/update', 'CategoryUpdate')->name('category.update');
            
        });
        
        //Product All Route
        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/all', 'ProductAll')->name('product.all');
            Route::get('/product/add', 'ProductAdd')->name('product.add');
            Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
            Route::post('/product/store', 'ProductStore')->name('product.store');
            Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
            Route::post('/product/update', 'ProductUpdate')->name('product.update');
            
        });

        //Purchase All Route
        Route::controller(PurchaseController::class)->group(function () {
            Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');
            Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
            Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
            Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
            Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
            Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
            Route::get('/purchase/report', 'StockPurchaseReport')->name('stock.purchase');
            Route::get('/purchase/report/pdf', 'PurchaseReportPdf')->name('purchse.report.pdf');
            
        });

        //Default All Route
        Route::controller(DefaultControlller::class)->group(function () {
            Route::get('/get-category', 'GetCategory')->name('get-category');
            Route::get('/get-product', 'GetProduct')->name('get-product');
            Route::get('/check-product', 'CheckProduct')->name('check-product');
            
        });

        //Invoice All Route
        Route::controller(InvoiceController::class)->group(function () {
            Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
            Route::get('/invoice/pending/list', 'InvoicePending')->name('invoice.pending');
            Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add');
            Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
            Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
            Route::get('/invoice/print/list', 'InvoicePrintList')->name('invoice.print.list');
            Route::get('/invoice/print/{id}', 'InvoicePrint')->name('invoice.print');
            Route::get('/invoice/report/daily', 'InvoiceDailyReport')->name('invoice.daily.report');
            Route::get('/invoice/report/pdf', 'InvoiceDailyPdf')->name('invoice.daily.pdf');
            Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');
            Route::post('/invoice/approval/store/{id}', 'ApprovalStore')->name('approval.store');
            
        });

        //Stock All Route
        Route::controller(StockController::class)->group(function () {
            Route::get('/stock/report', 'StockReport')->name('stock.report');
            Route::get('/stock/spwise', 'StockSPWise')->name('stock.spwise');
            Route::get('/stock/supplier/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
            Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');
            Route::get('/stock/product/pdf', 'ProductWisePdf')->name('product.wise.pdf');
            
        });
});//End Group Middlewear

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
