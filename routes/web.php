<?php

use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    $institution = InstitutionController::getInstitutions();
    return view('test')->with('institution', $institution);
});
