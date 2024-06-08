<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function page($page=1){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
        $start = ($page-1)*5;
        $students = array_slice($studenti, $start, 5);
        
        return $students;
        
    }
    public function search($search){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
       
        $studenti = array_slice($studenti, 0, 5);
        
        return $studenti;
        
    }
    public function student($id){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/diplomac/$id");
        $student = json_decode($studenti_json);
        
        return view('student', ['student' => $student]);
        
    }
    
}

// Sredite rute u routes/api.php tako da gađaju StudentAPIController
// U Student kontroleru definišite metode:
// public function page($page=1){}
// public function search($search){}
// public function student($id){}

// Testirajte
