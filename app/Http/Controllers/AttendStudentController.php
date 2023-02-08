<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendStudentController extends Controller
{
    public function index()
    {
        $Attendance = Attendance::where('student_id',auth()->user()->id)->get();
     
        return view('pages.Students.dashboard.Attendance.index', compact('Attendance'));
    }
}
