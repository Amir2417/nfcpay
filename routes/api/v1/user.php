<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\ProfileController;
use App\Http\Controllers\Api\V1\User\AddMoneyController;
use App\Http\Controllers\Api\V1\User\DashboardController;
use App\Http\Controllers\Api\V1\User\TransactionController;

Route::prefix("user")->name("api.user.")->group(function(){

    Route::controller(ProfileController::class)->prefix('profile')->group(function(){
        Route::get('info','profileInfo');
        Route::post('info/update','profileInfoUpdate');
        Route::post('password/update','profilePasswordUpdate');
    });

    // Logout Route
    Route::post('logout',[ProfileController::class,'logout']);

    // Dashboard, Notification, 
    Route::controller(DashboardController::class)->group(function(){
        Route::get("dashboard","dashboard");
        Route::get("notifications","notifications");
    });
});