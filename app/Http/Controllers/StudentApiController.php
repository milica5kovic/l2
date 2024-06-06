<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function apiStudents(){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
        return $studenti;
    }
    public function apiStudentsPage($page){
        $studenti_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/list");
        $studenti = json_decode($studenti_json);
        
        $start = ($page-1)*10;
        $students = array_slice($studenti, $start, 10);
        
        return $students;
    }
    
    public function apiStudent($id){
        $student_json = file_get_contents("http://alumni.raf.edu.rs/rs/api/diplomac/$id");
        $student = json_decode($student_json);

        return $student;
    }
}
