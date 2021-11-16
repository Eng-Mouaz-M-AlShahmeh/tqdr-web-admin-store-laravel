<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ServiceProviderController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\SocialLinksController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\NighborhoodController;
use App\Http\Controllers\Api\CommercialRegisterController;
use App\Http\Controllers\Api\NationalController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\InvoiceOrderController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    
    // Admin Routes
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/{id}', [AdminController::class, 'show']);
    Route::post('admin/create', [AdminController::class, 'store']);
    Route::post('admin/update/{id}',  [AdminController::class, 'update']);
    Route::delete('admin/delete/{id}',  [AdminController::class, 'destroy']);

    // Address Routes
    Route::get('address', [AddressController::class, 'index']);
    Route::get('address/{id}', [AddressController::class, 'show']);
    Route::post('address/create', [AddressController::class, 'store']);
    Route::post('address/update/{id}', [AddressController::class, 'update']);
    Route::delete('address/delete/{id}', [AddressController::class, 'destroy']);

    // ServiceProviders Routes
    Route::get('serviceprovider', [ServiceProviderController::class, 'index']);
    Route::get('serviceprovider/{id}', [ServiceProviderController::class, 'show']);
    Route::post('serviceprovider/create', [ServiceProviderController::class, 'store']);
    Route::post('serviceprovider/update/{id}', [ServiceProviderController::class, 'update']);
    Route::delete('serviceprovider/delete/{id}', [ServiceProviderController::class, 'destroy']);

    // Customers Routes
    Route::get('customer', [CustomerController::class, 'index']);
    Route::get('customer/{id}', [CustomerController::class, 'show']);
    Route::post('customer/create', [CustomerController::class, 'store']);
    Route::post('customer/update/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/delete/{id}', [CustomerController::class, 'destroy']);

    // Stores Routes
    Route::get('store', [StoreController::class, 'index']);
    Route::get('store/{id}', [StoreController::class, 'show']);
    Route::post('store/create', [StoreController::class, 'store']);
    Route::post('store/update/{id}', [StoreController::class, 'update']);
    Route::delete('store/delete/{id}', [StoreController::class, 'destroy']);

    // Banks Routes
    Route::get('bank', [BankController::class, 'index']);
    Route::get('bank/{id}', [BankController::class, 'show']);
    Route::post('bank/create', [BankController::class, 'store']);
    Route::post('bank/update/{id}', [BankController::class, 'update']);
    Route::delete('bank/delete/{id}', [BankController::class, 'destroy']);

    // Social Links Routes
    Route::get('sociallinks', [SocialLinksController::class, 'index']);
    Route::get('sociallinks/{id}', [SocialLinksController::class, 'show']);
    Route::post('sociallinks/create', [SocialLinksController::class, 'store']);
    Route::post('sociallinks/update/{id}', [SocialLinksController::class, 'update']);
    Route::delete('sociallinks/delete/{id}', [SocialLinksController::class, 'destroy']);

    // Countries Routes
    Route::get('country', [CountryController::class, 'index']);
    Route::get('country/{id}', [CountryController::class, 'show']);
    Route::post('country/create', [CountryController::class, 'store']);
    Route::post('country/update/{id}', [CountryController::class, 'update']);
    Route::delete('country/delete/{id}', [CountryController::class, 'destroy']);

    // Cities Routes
    Route::get('city', [CityController::class, 'index']);
    Route::get('city/{id}', [CityController::class, 'show']);
    Route::post('city/create', [CityController::class, 'store']);
    Route::post('city/update/{id}', [CityController::class, 'update']);
    Route::delete('city/delete/{id}', [CityController::class, 'destroy']);

    // Nighborhoods Routes
    Route::get('nighborhood', [NighborhoodController::class, 'index']);
    Route::get('nighborhood/{id}', [NighborhoodController::class, 'show']);
    Route::post('nighborhood/create', [NighborhoodController::class, 'store']);
    Route::post('nighborhood/update/{id}', [NighborhoodController::class, 'update']);
    Route::delete('nighborhood/delete/{id}', [NighborhoodController::class, 'destroy']);

    // Commercial Register Routes
    Route::get('cr', [CommercialRegisterController::class, 'index']);
    Route::get('cr/{id}', [CommercialRegisterController::class, 'show']);
    Route::post('cr/create', [CommercialRegisterController::class, 'store']);
    Route::post('cr/update/{id}', [CommercialRegisterController::class, 'update']);
    Route::delete('cr/delete/{id}', [CommercialRegisterController::class, 'destroy']);

    // Nationals Routes
    Route::get('national', [NationalController::class, 'index']);
    Route::get('national/{id}', [NationalController::class, 'show']);
    Route::post('national/create', [NationalController::class, 'store']);
    Route::post('national/update/{id}', [NationalController::class, 'update']);
    Route::delete('national/delete/{id}', [NationalController::class, 'destroy']);

    // Invoices Routes
    Route::get('invoice', [InvoiceController::class, 'index']);
    Route::get('invoice/{id}', [InvoiceController::class, 'show']);
    Route::post('invoice/create', [InvoiceController::class, 'store']);
    Route::post('invoice/update/{id}', [InvoiceController::class, 'update']);
    Route::delete('invoice/delete/{id}', [InvoiceController::class, 'destroy']);

    // Invoice Orders Routes
    Route::get('invoiceorder', [InvoiceOrderController::class, 'index']);
    Route::get('invoiceorder/{id}', [InvoiceOrderController::class, 'show']);
    Route::post('invoiceorder/create', [InvoiceOrderController::class, 'store']);
    Route::post('invoiceorder/update/{id}', [InvoiceOrderController::class, 'update']);
    Route::delete('invoiceorder/delete/{id}', [InvoiceOrderController::class, 'destroy']);

    // Notifications Routes
    Route::get('notification', [NotificationController::class, 'index']);
    Route::get('notification/{id}', [NotificationController::class, 'show']);
    Route::post('notification/create', [NotificationController::class, 'store']);
    Route::post('notification/update/{id}', [NotificationController::class, 'update']);
    Route::delete('notification/delete/{id}', [NotificationController::class, 'destroy']);

     // Settings Routes
     Route::get('setting', [SettingController::class, 'index']);
     Route::get('setting/{id}', [SettingController::class, 'show']);
     Route::post('setting/create', [SettingController::class, 'store']);
     Route::post('setting/update/{id}', [SettingController::class, 'update']);
     Route::delete('setting/delete/{id}', [SettingController::class, 'destroy']);
});


