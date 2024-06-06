<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function apiStudents(){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
        return $studenti;
    }
    public function apiStudentsPage($page){
        
    }
    public function apiStudentsSearch($search){
        
    }
    public function apiStudent($id){
        
    }
}

// public function apiStudentsSearch($search){}
// public function apiStudent($id){}
// 3. U ove metode prebacite kood iz handlera u routes/api.php
// 4. Rute promeniti tako da umesto handler funkcije pozivaju metod kontrolera
// 	Route::get('/student/{id}', [StudentController::class, 'apiStudents']);
// 	Itd.
// 5. U routes/api.php na pocetku koda dodati use direktivu za klasu kontrolera:
// 	use App\Http\Controllers\StudentController;

// 5. Testirati da li sve radi
