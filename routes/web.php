<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    $institution = InstitutionController::getInstitutions();
    return view('login')->with('institution', $institution);
});

Route::get('/', function () {
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/upload', function () {
    $types = TypeController::getAllTypes();
    return view('upload')->with('types', $types);
})->middleware('auth');

Route::get('/search', function () {
    return view('search');
})->middleware('auth');

Route::post('/upload', 'App\Http\Controllers\FileController@store')
    ->name('files.store')
    ->middleware('auth');

