<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/cliente', function () {
    return view('client.index');
});

