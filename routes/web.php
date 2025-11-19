<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    FederationController,
    ModalityController,
    GraduationFormatController,
    InstructorController
};

Route::get('/', function () {
    return view('public.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('federations', FederationController::class);
    Route::resource('modalities', ModalityController::class);
    Route::resource('instrutores', InstructorController::class)->parameters(['instrutores' => 'instrutor']);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('classes', ClassController::class);
    Route::resource('graduation-formats', GraduationFormatController::class);
    Route::resource('progress', StudentProgressController::class);
});
