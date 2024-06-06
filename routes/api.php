<?php

use App\Http\Controllers\StudentApiController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', [StudentApiController::class, 'apiStudents']);


Route::get('/students/{page}', [StudentApiController::class, 'apiStudentsPage']);


Route::get('/student/{id}', [StudentApiController::class, 'apiStudent']);


    
    

// Pripremite kontrolere i rute
// Napravite novi kontroler, StudentAPI
// API metode iz kontrolera Student premestite u StudentAPI


