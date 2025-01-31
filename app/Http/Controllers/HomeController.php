<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $schools = School::with('students')->get();
        $students = Student::with('school')->get();
        return view('index', compact('schools', 'students'));
    }
}
