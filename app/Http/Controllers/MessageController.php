<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Message;
use App\Models\Newmessage;
use Auth;

class MessageController extends Controller
{
    public function Message()
    {
        if(Auth::user()->userType->name =='Admin'){            
            $students = Student::all();
        }
        else{
            $user_id = Auth::id();
            $students = Student::where('Lead_parent', $user_id)->get();
        }

        return view('message.index', compact('students'));
    }

    public function MessageView($reciever_id, $student_id)
    { 

        return view('message.view', compact('reciever_id', 'student_id'));
    }


    public function messagesend(Request $request)
    {
        $data = $request->all();
        $reciever_id = $data['receiver_id'];
        $student_id = $data['student_id'];
        $content = $data['content'];
        $user_id = Auth::id();

        $saveData = [];
        $saveData['receiver_id'] = $reciever_id;
        $saveData['student_id'] = $student_id;
        $saveData['content'] = $content;
        $saveData['sender_id'] = $user_id;
        $save = Newmessage::create($saveData);
    }

    public function fetchMessages(Request $request)
    {

        $data = $request->all();
        $user_id = Auth::id();
        $sentMessages = Newmessage::where('receiver_id', $data['receiver_id'])
                        ->orWhere('receiver_id', $user_id)
                        ->where('student_id', $data['student_id'])
                        ->where('sender_id', $user_id)
                        ->orWhere('sender_id', $data['receiver_id'])
                        ->get(); // Assuming 'receiver_id' is the column name in your 'messages' table

        return response()->json(['messages' => $sentMessages, 'user_id' => $user_id]);
    }
    // public function MessageStudents(Request $request, $student_id)
    // {
    //     $student = Student::findOrFail($student_id);
    //     return view('recruiter.panel.student.MessageStudents', compact('student'));
    // }
}
