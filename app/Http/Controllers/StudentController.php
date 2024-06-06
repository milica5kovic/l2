<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function page($page=1){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
        $start = ($page-1)*10;
        $students = array_slice($studenti, $start, 10);
        
        return $students;
        
    }
    public function search($search){
        
    }
    public function student($id){
        
    }
    
}

// Sredite rute u routes/api.php tako da gađaju StudentAPIController
// U Student kontroleru definišite metode:
// public function page($page=1){}
// public function search($search){}
// public function student($id){}

// Testirajte
