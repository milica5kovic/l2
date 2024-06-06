<?php

// svaki use i import treba da ima veliko slovo za naziv foldera
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', [StudentController::class, 'apiStudents']);


Route::get('/students/{page}', function ($page, Request $request) {

    $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
    $studenti = json_decode($studenti_json);

    $start = ($page - 1) * 10;
    $students = array_slice($studenti, $start, 10);

    return $students;

    // Definišemo rutu /api/students/searchquery
    // U api.php ubacite rutu students/{searchquery}
    // U handler funkciju umetnite prvi parametar $q
    // U handleru rute dohvatite sa alumni API-ja alumni.raf.edu.rs/rs/api/find/$q
    // Dekodujte JSON podatke i vratite prvih 5 rezultata

});
//Nema smisla opet ista funkcija al ajd to je jbn PPP

// Route::get('/students/{searchquery}', function ($search, Request $request){
//     $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
//     $studenti = json_decode($studenti_json);

//     $studenti = array_slice($studenti, 0, $search);

//     return $studenti;
// });


// --------------------------------------------------------------------------------------------------------
// Definišemo rutu /api/student/id
// U api.php ubacite rutu student/{id}
// U handler funkciju umetnite prvi parametar $id
// U handleru rute dohvatite sa alumni API-ja alumni.raf.edu.rs/rs/api/diplomac/$id
// Dekodujte JSON podatke i vratite objekat
// Testirajte sa id-em 5563, na primer. Pogledajte u /api/students sta sve daje od id-eva

Route::get('/student/{id}', function ($id, Request $request) {
    $student_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/diplomac/$id");
    $student = json_decode($student_json);

    return $student;
});
