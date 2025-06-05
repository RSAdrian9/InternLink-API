<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $schools = School::with('students')->get();
        $students = User::with('school')->get();
        return view('index', compact('schools', 'students'));
    }
}
