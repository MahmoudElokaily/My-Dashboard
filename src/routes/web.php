<?php

use Elokaily\Dashboard\Controllers\Auth\AuthConttoller;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "dashboard" , "as" => "dashboard"] , function (){
//    Route::get('' , [AuthConttoller::class , "login"]);
});
