<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stutudent;
use App\Models\User;

class StutudentController extends Controller
{
    public function index()
    {
        $students = Stutudent::orderBy('id', 'DESC')->get();
        return view('student',compact('students'));
    }
    public function addstudent(Request $request)
    {
        $student = new Stutudent();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save(); 
        return response()->json($student, 200);
    }


    public function home()
    {
        return view('searchDemo');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Stutudent::select("email as value", "id")
                    ->where('email', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }
}
