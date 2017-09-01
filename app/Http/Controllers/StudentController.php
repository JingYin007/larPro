<?php

namespace App\Http\Controllers;

use App\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        //$students = Student::get();
        $students = Student::where('age', '>', 10)
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('student.index',[
            'students' => $students,
        ]);
    }

    public function create(Request $request){
        $student = new Student();
        if ($request->getMethod() == 'POST'){
            //1.控制器验证
            /* $this->validate($request,[
                'student.name' => 'required|min:2|max:20',
                 'student.age' => 'required|integer',
                 'student.sex' => 'required|integer',
             ],[
                 'required' => ':attribute 为必填项',
                 'min' => ':attribute 长度不符合要求',
                 'integer' => ':attribute 必须为整数'
             ],[
                 'student.name' => '姓名',
                 'student.age' => '年龄',
                 'student.sex' => '性别'
             ]);*/

            //2.Validator类验证
            $validator = \Validator::make($request->input(),[
                'student.name' => 'required|min:2|max:20',
                'student.age' => 'required|integer',
                'student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别'
            ]);

            if ($validator->fails()){
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $request->input('student');
            if (Student::create($data)){
                return redirect('student/index')
                    ->with('success','添加成功');
            }else{
                return redirect()->back();
            }
        }
        return view('student.create',[
            'student' => $student,
        ]);

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

    public function update(Request $request,$id){
        $student = Student::find($id);

        if ($request->getMethod() == 'POST'){
            $this->validate($request,[
                'student.name' => 'required|min:2|max:20',
                'student.age' => 'required|integer',
                'student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数'
            ],[
                'student.name' => '姓名',
                'student.age' => '年龄',
                'student.sex' => '性别'
            ]);

            $data = $request->input('student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if ($student->save()){
                return redirect('student/index')
                    ->with('success','修改成功');
            }
        }
        return view('student/update',[
            'student' => $student,
        ]);
    }

    public function detail(Request $request,$id){
        $student = Student::find($id);
        return view('student/detail',[
            'student' => $student,
        ]);
    }

    public function delete($id){
        $student = Student::find($id);
        if ($student->delete()){
            return redirect('student/index')
                ->with('success','删除成功');
        }

    }
}
