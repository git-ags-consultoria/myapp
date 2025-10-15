<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\FederationController;

Route::get('/', function () {
    return view('public.index');
});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/cliente', function () {
    return view('client.index');
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('federations', FederationController::class);
});
