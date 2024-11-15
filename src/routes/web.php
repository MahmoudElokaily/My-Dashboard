<?php

use Elokaily\Dashboard\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "dashboard" , "as" => "dashboard." , "middleware" => "web"] , function (){
    // auth pages
    Route::group(["middleware" => "auth"] , function (){
        Route::get('/' , [AuthController::class , "dashboard"])->name('main');
        Route::get('/logout' , [AuthController::class , "logout"])->name('logout');

    });

    // unAuth pages
    Route::middleware('guest')->group(function () {
        Route::get("login", [AuthController::class, "login"])->name('login');
        Route::post("authenticate/user", [AuthController::class, "authenticate"])->name('authenticate');
        Route::get("register", [AuthController::class, "register"])->name('register');
        Route::post("create/user", [AuthController::class, "createUser"])->name('create-user');
        Route::get('forget-password' , [AuthController::class, "forgetPassword"])->name('forget-password');
        Route::post('send-mail-to-reset-password' , [AuthController::class, "sendMailReset"])->name('send-mail-reset');
        Route::get('reset-password/{token}' , [AuthController::class, "resetPassword"])->name('reset-password');
        Route::post('update-password' , [AuthController::class, "updatePassword"])->name('update-password');
//        Route::get('/google-data' , [AuthController::class , "googleData"])->name('googleData');



        // aurh google and facebook
        Route::get("/redirection/{provider}", [AuthController::class, "authProviderRedirect"])->name('redirection');
        Route::get('/{provider}/callback' , [AuthController::class , "socialAuthentication"])->name('callback');

    });
});
