<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\hurryupApp\RestaurantController;
use App\Http\Controllers\hurryupApp\AddressController;
use App\Http\Controllers\hurryupApp\ThumbnailController;
use App\Http\Controllers\hurryupApp\PhoneListController;
use App\Http\Controllers\hurryupApp\PhoneController;
use App\Http\Controllers\hurryupApp\FoodController;
use App\Http\Controllers\hurryupApp\TransactionController;
use Illuminate\Support\Facades\Request;

function get_user_info()
{
    return [];
}

Route::get('/', function()
{
	return View::make('welcome');
});

Route::get('/test', function() {
	return Response::prettyjson(true);
});
 
Route::group(['prefix' => 'prod/v1'], function() {
	
	Route::get('/', function() {
		//show API
		return View::make('showapi', array(
			'auth_info' => get_user_info(),
			'api_name' => 'Default Laravel Production',
			'api_routes' => [
				[
					'name' => '/prod/v1',
					'description' => 'Production API v1.0',
                    'url' => 'prod/v1/'
                ],
                [
					'name' => '/prod/v1/',
					'description' => 'Production API v1.0',
                    'url' => 'prod/v1/restaurant'
				]
			]
		));
	});  

    Route::get('/restaurant', [RestaurantController::class, 'index']); 
    Route::post('/restaurant', [RestaurantController::class, 'store']); 
    Route::get('/restaurant/{restid}', [RestaurantController::class, 'show']); 
    Route::put('/restaurant/{restid}', [RestaurantController::class, 'update']); 
    Route::delete('/restaurant/{restid}', [RestaurantController::class, 'destroy']); 
    
    Route::get('/address', [AddressController::class, 'index']); 
    Route::post('/address', [AddressController::class, 'store']); 
    Route::get('/address/{addressid}', [AddressController::class, 'show']); 
    Route::put('/address/{addressid}', [AddressController::class, 'update']); 
    Route::delete('/address/{addressid}', [AddressController::class, 'destroy']); 

    
    Route::post('/thumbnail', [ThumbnailController::class, 'store']); 
    Route::get('/thumbnail/{thumbid}', [ThumbnailController::class, 'show']); 
    Route::put('/thumbnail/{thumbid}', [ThumbnailController::class, 'update']); 
    Route::delete('/thumbnail/{thumbid}', [ThumbnailController::class, 'destroy']); 

    Route::post('/food', [FoodController::class, 'store']); 
    Route::get('/food/{foodid}', [FoodController::class, 'show']); 
    Route::put('/food/{foodid}', [FoodController::class, 'update']); 
    Route::delete('/food/{foodid}', [FoodController::class, 'destroy']); 

    Route::post('/phoneList', [PhoneListController::class, 'store']); 
    Route::get('/phoneList/{phoneListId}', [PhoneListController::class, 'show']); 
    Route::put('/phoneList/{phoneListId}', [PhoneListController::class, 'update']); 
    Route::delete('/phoneList/{phoneListId}', [PhoneListController::class, 'destroy']);
    
    Route::post('/transaction', [TransactionController::class, 'store']); 
    Route::get('/transaction/{transactionid}', [TransactionController::class, 'show']); 
    Route::put('/transaction/{transactionid}', [TransactionController::class, 'update']); 
    Route::delete('/transaction/{transactionid}', [TransactionController::class, 'destroy']);

    Route::get('/token', function () {
        $token = Request::session()->token();
        $token = csrf_token();
        return $token; 
    });
});


