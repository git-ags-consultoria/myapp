<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.index');
});


Route::get('/painel', function () {
    return view('painel.index');
});