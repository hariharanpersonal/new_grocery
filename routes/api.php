<?php

use App\Http\Controllers\Api\v1\signupController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;



Route::prefix('v1')->group(function (){
    Route::post('/signup', [signupController::class, 'signup'])->name('api.signup');

}); 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

