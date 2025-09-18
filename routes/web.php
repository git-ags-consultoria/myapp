<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.index');
});


Route::get('/painel', function () {
    return view('painel.index');
});


Route::get('/adm', function () {
    return view('painel.adm.index');
});


Route::get('/aluno', function () {
    return view('painel.aluno.index');
});


Route::get('/professor', function () {
    return view('painel.professor.index');
});
