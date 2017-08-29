<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        //$students = Student::get();
        $students = Student::paginate(5);
        return view('student.index',[
            'students' => $students,
        ]);
    }

    public function create(Request $request){
        if ($request->getMethod() == 'POST'){

            $data = $request->input('student');
            if (Student::create($data)){
                return redirect('student/index')
                    ->with('success','添加成功');
            }else{
                return redirect()->back();
            }
        }else{
            return view('student.create');
        }
    }

    public function save(Request $request){
        $data = $request->input('student');
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if ($student->save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }
    }

}
