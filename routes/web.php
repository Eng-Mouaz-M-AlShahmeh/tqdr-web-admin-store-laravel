<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\NighborhoodController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\SocialLinksController;
use App\Http\Controllers\Admin\CommercialRegisterController;
use App\Http\Controllers\Admin\NationalController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InvoiceOrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Store\StoreInvoiceOrderController;

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
    //App::setLocale($lang);
    return view('front.index');
})->name('front.index');

Route::get('/about', function () {
    return view('front.about');
})->name('front.about');

Route::get('/contact', function () {
    return view('front.contact');
})->name('front.contact');

Route::get('/join', function () {
    return view('front.join');
})->name('front.join');

Route::get('/privacy', function () {
    return view('front.privacy');
})->name('front.privacy');

Route::get('/terms', function () {
    return view('front.terms');
})->name('front.terms');

Route::post('front/pay',  [FrontController::class, 'pay'])->name('front.pay');
Route::get('front/paysuccess/{id}',  [FrontController::class, 'paysuccess'])->name('front.paysuccess');
Route::get('front/storepay/{id}',  [FrontController::class, 'storepay'])->name('front.storepay');

Route::get('/admin/login', [FrontController::class,'adminLogin'])->name('front.admin.login');
Route::post('/admin/checkLogin', [FrontController::class,'adminCheckLogin'])->name('front.admin.checkLogin');
Route::get('/admin/successLogin', [FrontController::class,'adminSuccessLogin'])->name('adminSuccessLogin');
Route::get('/admin/logout', [FrontController::class,'adminLogout'])->name('adminLogout');

Route::get('/store/login', [FrontController::class,'storeLogin'])->name('front.store.login');
Route::post('/store/checkLogin', [FrontController::class,'storeCheckLogin'])->name('front.store.checkLogin');
Route::get('/store/successLogin', [FrontController::class,'storeSuccessLogin'])->name('storeSuccessLogin');
Route::get('/store/logout', [FrontController::class,'storeLogout'])->name('storeLogout');

//... admin routes .....................................................................................
Route::prefix('admin')->group(function() {
    Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/', [AdminController::class,'index'])->name('admin.dashboard.index');
            Route::get('/profile', [AdminController::class,'profile'])->name('admin.dashboard.profile');
            Route::post('/profile/update', [AdminController::class,'profileUpdate'])->name('admin.dashboard.profile.update');
            //....CustomerController....................................................................................
            Route::get('/customer', [CustomerController::class,'index'])->name('admin.customer.index');
            Route::get('/customer/{id}', [CustomerController::class,'show'])->name('admin.customer.show');
            Route::get('/customer/create/{a?}', [CustomerController::class,'create'])->name('admin.customer.create');
            Route::post('/customer/store', [CustomerController::class,'store'])->name('admin.customer.store');
            Route::get('/customer/edit/{id}', [CustomerController::class,'edit'])->name('admin.customer.edit');
            Route::post('/customer/update/{id}', [CustomerController::class,'update'])->name('admin.customer.update');  
            Route::post('/customer/destroy/{id}',[CustomerController::class,'destroy'])->name('admin.customer.destroy');
            //....CustomerController end....................................................................................
            //....ServiceProviderController....................................................................................
            Route::get('/serviceprovider', [ServiceProviderController::class,'index'])->name('admin.serviceprovider.index');
            Route::get('/serviceprovider/{id}', [ServiceProviderController::class,'show'])->name('admin.serviceprovider.show');
            Route::get('/serviceprovider/create/{a?}', [ServiceProviderController::class,'create'])->name('admin.serviceprovider.create');
            Route::post('/serviceprovider/store', [ServiceProviderController::class,'store'])->name('admin.serviceprovider.store');
            Route::get('/serviceprovider/edit/{id}', [ServiceProviderController::class,'edit'])->name('admin.serviceprovider.edit');
            Route::post('/serviceprovider/update/{id}', [ServiceProviderController::class,'update'])->name('admin.serviceprovider.update');  
            Route::post('/serviceprovider/destroy/{id}',[ServiceProviderController::class,'destroy'])->name('admin.serviceprovider.destroy');
            Route::post('/serviceprovider//status/{id}', [ServiceProviderController::class,'updateStatus'])->name('admin.serviceprovider.status');
            //....ServiceProviderController end....................................................................................
            //....NighborhoodController....................................................................................
            Route::get('/store/address/nighborhood', [NighborhoodController::class,'index'])->name('admin.nighborhood.index');
            Route::get('/store/address/nighborhood/{id}', [NighborhoodController::class,'show'])->name('admin.nighborhood.show');
            Route::get('/store/address/nighborhood/create/{a?}', [NighborhoodController::class,'create'])->name('admin.nighborhood.create');
            Route::post('/store/address/nighborhood/store', [NighborhoodController::class,'store'])->name('admin.nighborhood.store');
            Route::get('/store/address/nighborhood/edit/{id}', [NighborhoodController::class,'edit'])->name('admin.nighborhood.edit');
            Route::post('/store/address/nighborhood/update/{id}', [NighborhoodController::class,'update'])->name('admin.nighborhood.update');  
            Route::post('/store/address/nighborhood/destroy/{id}',[NighborhoodController::class,'destroy'])->name('admin.nighborhood.destroy');
            //  Route::post('/nighborhood//status/{id}', [NighborhoodController::class,'updateStatus'])->name('admin.nighborhood.status');
            //....NighborhoodController end....................................................................................
            //....CityController....................................................................................
            Route::get('/store/address/city', [CityController::class,'index'])->name('admin.city.index');
            Route::get('/store/address/city/{id}', [CityController::class,'show'])->name('admin.city.show');
            Route::get('/store/address/city/create/{a?}', [CityController::class,'create'])->name('admin.city.create');
            Route::post('/store/address/city/store', [CityController::class,'store'])->name('admin.city.store');
            Route::get('/store/address/city/edit/{id}', [CityController::class,'edit'])->name('admin.city.edit');
            Route::post('/store/address/city/update/{id}', [CityController::class,'update'])->name('admin.city.update');  
            Route::post('/store/address/city/destroy/{id}',[CityController::class,'destroy'])->name('admin.city.destroy');
            //  Route::post('/city//status/{id}', [NighborhoodController::class,'updateStatus'])->name('admin.city.status');
            //....CityController end....................................................................................
            //....CountryController....................................................................................
            Route::get('/store/address/country', [CountryController::class,'index'])->name('admin.country.index');
            Route::get('/store/address/country/{id}', [CountryController::class,'show'])->name('admin.country.show');
            Route::get('/store/address/country/create/{a?}', [CountryController::class,'create'])->name('admin.country.create');
            Route::post('/store/address/country/store', [CountryController::class,'store'])->name('admin.country.store');
            Route::get('/store/address/country/edit/{id}', [CountryController::class,'edit'])->name('admin.country.edit');
            Route::post('/store/address/country/update/{id}', [CountryController::class,'update'])->name('admin.country.update');  
            Route::post('/store/address/country/destroy/{id}',[CountryController::class,'destroy'])->name('admin.country.destroy');
            //  Route::post('/country//status/{id}', [CountryController::class,'updateStatus'])->name('admin.country.status');
            //....CountryController end....................................................................................
            //....AddressController....................................................................................
            Route::get('/store/address', [AddressController::class,'index'])->name('admin.address.index');
            Route::get('/store/address/{id}', [AddressController::class,'show'])->name('admin.address.show');
            Route::get('/store/address/create/{a?}', [AddressController::class,'create'])->name('admin.address.create');
            Route::post('/store/address/store', [AddressController::class,'store'])->name('admin.address.store');
            Route::get('/store/address/edit/{id}', [AddressController::class,'edit'])->name('admin.address.edit');
            Route::post('/store/address/update/{id}', [AddressController::class,'update'])->name('admin.address.update');  
            Route::post('/store/address/destroy/{id}',[AddressController::class,'destroy'])->name('admin.address.destroy');
            //  Route::post('/address//status/{id}', [AddressController::class,'updateStatus'])->name('admin.address.status');
            //....AddressController end....................................................................................
            //....BankController....................................................................................
            Route::get('/store/bank', [BankController::class,'index'])->name('admin.bank.index');
            Route::get('/store/bank/{id}', [BankController::class,'show'])->name('admin.bank.show');
            Route::get('/store/bank/create/{a?}', [BankController::class,'create'])->name('admin.bank.create');
            Route::post('/store/bank/store', [BankController::class,'store'])->name('admin.bank.store');
            Route::get('/store/bank/edit/{id}', [BankController::class,'edit'])->name('admin.bank.edit');
            Route::post('/store/bank/update/{id}', [BankController::class,'update'])->name('admin.bank.update');  
            Route::post('/store/bank/destroy/{id}',[BankController::class,'destroy'])->name('admin.bank.destroy');
            //  Route::post('/bank//status/{id}', [BankController::class,'updateStatus'])->name('admin.bank.status');
            //....BankController end....................................................................................
            //....SocialLinksController....................................................................................
            Route::get('/store/sociallinks', [SocialLinksController::class,'index'])->name('admin.sociallinks.index');
            Route::get('/store/sociallinks/{id}', [SocialLinksController::class,'show'])->name('admin.sociallinks.show');
            Route::get('/store/sociallinks/create/{a?}', [SocialLinksController::class,'create'])->name('admin.sociallinks.create');
            Route::post('/store/sociallinks/store', [SocialLinksController::class,'store'])->name('admin.sociallinks.store');
            Route::get('/store/sociallinks/edit/{id}', [SocialLinksController::class,'edit'])->name('admin.sociallinks.edit');
            Route::post('/store/sociallinks/update/{id}', [SocialLinksController::class,'update'])->name('admin.sociallinks.update');  
            Route::post('/store/sociallinks/destroy/{id}',[SocialLinksController::class,'destroy'])->name('admin.sociallinks.destroy');
            //  Route::post('/sociallinks//status/{id}', [SocialLinksController::class,'updateStatus'])->name('admin.sociallinks.status');
            //....SocialLinksController end....................................................................................
            //....CommercialRegisterController....................................................................................
            Route::get('/store/cr', [CommercialRegisterController::class,'index'])->name('admin.cr.index');
            Route::get('/store/cr/{id}', [CommercialRegisterController::class,'show'])->name('admin.cr.show');
            Route::get('/store/cr/create/{a?}', [CommercialRegisterController::class,'create'])->name('admin.cr.create');
            Route::post('/store/cr/store', [CommercialRegisterController::class,'store'])->name('admin.cr.store');
            Route::get('/store/cr/edit/{id}', [CommercialRegisterController::class,'edit'])->name('admin.cr.edit');
            Route::post('/store/cr/update/{id}', [CommercialRegisterController::class,'update'])->name('admin.cr.update');  
            Route::post('/store/cr/destroy/{id}',[CommercialRegisterController::class,'destroy'])->name('admin.cr.destroy');
            //  Route::post('/cr//status/{id}', [SocialLinksController::class,'updateStatus'])->name('admin.cr.status');
            //....CommercialRegisterController end....................................................................................
            //....NationalController....................................................................................
            Route::get('/store/national', [NationalController::class,'index'])->name('admin.national.index');
            Route::get('/store/national/{id}', [NationalController::class,'show'])->name('admin.national.show');
            Route::get('/store/national/create/{a?}', [NationalController::class,'create'])->name('admin.national.create');
            Route::post('/store/national/store', [NationalController::class,'store'])->name('admin.national.store');
            Route::get('/store/national/edit/{id}', [NationalController::class,'edit'])->name('admin.national.edit');
            Route::post('/store/national/update/{id}', [NationalController::class,'update'])->name('admin.national.update');  
            Route::post('/store/national/destroy/{id}',[NationalController::class,'destroy'])->name('admin.national.destroy');
            //  Route::post('/national/status/{id}', [NationalController::class,'updateStatus'])->name('admin.national.status');
            //....NationalController end....................................................................................
            //....StoreController....................................................................................
            Route::get('/store', [AdminStoreController::class,'index'])->name('admin.store.index');
            Route::get('/store/{id}', [AdminStoreController::class,'show'])->name('admin.store.show');
            Route::get('/store/create/{a?}', [AdminStoreController::class,'create'])->name('admin.store.create');
            Route::post('/store/store', [AdminStoreController::class,'store'])->name('admin.store.store');
            Route::get('/store/edit/{id}', [AdminStoreController::class,'edit'])->name('admin.store.edit');
            Route::post('/store/update/{id}', [AdminStoreController::class,'update'])->name('admin.store.update');  
            Route::post('/store/destroy/{id}',[AdminStoreController::class,'destroy'])->name('admin.store.destroy');
            Route::post('/store/status/{id}', [AdminStoreController::class,'updateStatus'])->name('admin.store.status');
            //....StoreController end....................................................................................
            //....InvoiceController....................................................................................
            Route::get('/invoice', [InvoiceController::class,'index'])->name('admin.invoice.index');
            Route::get('/invoice/{id}', [InvoiceController::class,'show'])->name('admin.invoice.show');
            Route::get('/invoice/create/{a?}', [InvoiceController::class,'create'])->name('admin.invoice.create');
            Route::post('/invoice/store', [InvoiceController::class,'store'])->name('admin.invoice.store');
            Route::get('/invoice/edit/{id}', [InvoiceController::class,'edit'])->name('admin.invoice.edit');
            Route::post('/invoice/update/{id}', [InvoiceController::class,'update'])->name('admin.invoice.update');  
            Route::post('/invoice/destroy/{id}',[InvoiceController::class,'destroy'])->name('admin.invoice.destroy');
            Route::post('/invoice/status/{id}', [InvoiceController::class,'updateStatus'])->name('admin.invoice.status');
            Route::get('/invoice/pdf/{id}', [InvoiceController::class,'downloadPDF'])->name('admin.invoice.pdf');
            //....InvoiceController end....................................................................................
            //....InvoiceOrderController....................................................................................
            Route::get('/invoiceorder', [InvoiceOrderController::class,'index'])->name('admin.invoiceorder.index');
            Route::get('/invoiceorder/{id}', [InvoiceOrderController::class,'show'])->name('admin.invoiceorder.show');
            Route::get('/invoiceorder/create/{a?}', [InvoiceOrderController::class,'create'])->name('admin.invoiceorder.create');
            Route::post('/invoiceorder/store', [InvoiceOrderController::class,'store'])->name('admin.invoiceorder.store');
            Route::get('/invoiceorder/edit/{id}', [InvoiceOrderController::class,'edit'])->name('admin.invoiceorder.edit');
            Route::post('/invoiceorder/update/{id}', [InvoiceOrderController::class,'update'])->name('admin.invoiceorder.update');  
            Route::post('/invoiceorder/destroy/{id}',[InvoiceOrderController::class,'destroy'])->name('admin.invoiceorder.destroy');
            //....InvoiceOrderController end....................................................................................
            //....SettingController....................................................................................
            Route::get('/setting', [SettingController::class,'index'])->name('admin.setting.index');
            Route::get('/setting/{id}', [SettingController::class,'show'])->name('admin.setting.show');
            Route::get('/setting/create/{a?}', [SettingController::class,'create'])->name('admin.setting.create');
            Route::post('/setting/store', [SettingController::class,'store'])->name('admin.setting.store');
            Route::get('{id}/setting/edit/', [SettingController::class,'edit'])->name('admin.setting.edit');
            Route::post('/setting/update/{id}', [SettingController::class,'update'])->name('admin.setting.update');  
            Route::post('/setting/destroy/{id}',[SettingController::class,'destroy'])->name('admin.setting.destroy');
            //....SettingController end......................................................................................
    });
});
//... admin routes end ......................................................................................................
//...........................................................................................................................
//... store routes ..........................................................................................................
Route::prefix('store')->group(function() {
    Route::group(['middleware' => 'auth:store'], function () {
            Route::get('/', [StoreController::class,'index'])->name('store.dashboard.index');
            Route::get('/profile', [StoreController::class,'profile'])->name('store.dashboard.profile');
            Route::post('/profile/update', [StoreController::class,'profileUpdate'])->name('store.dashboard.profile.update');
            //....InvoiceOrderController........................................................................................
            Route::get('/invoiceorder', [StoreInvoiceOrderController::class,'index'])->name('store.invoiceorder.index');
            Route::get('/invoiceorder/{id}', [StoreInvoiceOrderController::class,'show'])->name('store.invoiceorder.show');
            Route::get('/invoiceorder/create/{a?}', [StoreInvoiceOrderController::class,'create'])->name('store.invoiceorder.create');
            Route::post('/invoiceorder/store', [StoreInvoiceOrderController::class,'store'])->name('store.invoiceorder.store');
            Route::get('/invoiceorder/edit/{id}', [StoreInvoiceOrderController::class,'edit'])->name('store.invoiceorder.edit');
            Route::post('/invoiceorder/update/{id}', [StoreInvoiceOrderController::class,'update'])->name('store.invoiceorder.update');  
            Route::post('/invoiceorder/destroy/{id}',[StoreInvoiceOrderController::class,'destroy'])->name('store.invoiceorder.destroy');
            //....InvoiceOrderController end....................................................................................
            
    });
});
//... store routes end .........................................................................................................