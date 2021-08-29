<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function viewStudent(Request $request)
    {
        $id = $request->id;

        $students = Student::where('id',$id)->get();
        return view('student.viewstudent',compact(['students']));
    }

    public function studentProfile()
    {
        $students = Student::where('email',Auth::user()->email)->get();
        return view('student.viewstudent',compact(['students']));
    }
}
