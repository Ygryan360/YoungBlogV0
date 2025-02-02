<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World';
});
Route::prefix('admin')->name('admin.')->group(function () {

});