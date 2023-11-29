<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function Message()
    {
        $user_id = Auth::id();
        $students = Student::where('Lead_parent', $user_id)->get();
       
        return view('message.index', compact('students'));
    }

    public function MessageView($reciever_id, $student_id)
    {       
        return view('message.view', compact('reciever_id','student_id'));
    }



    public function MessageStudents(Request $request, $student_id)
    {
        $student = Student::findOrFail($student_id);
        return view('recruiter.panel.student.MessageStudents', compact('student'));
    }
}
