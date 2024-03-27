<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

Route::name('frontend.')->group(function() {
    Route::controller(IndexController::class)->group(function() {
        Route::get('/','index')->name('index');
        Route::post("subscribe","subscribe")->name("subscribe");
        Route::post("contact/message/send","contactMessageSend")->name("contact.message.send");
        Route::get('link/{slug}','usefulLink')->name('useful.links');
        Route::post('languages/switch','languageSwitch')->name('languages.switch');

        
    });
});