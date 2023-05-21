<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::getStudent();
        $data['title'] = "Student";
        return view('admin.student.index', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['title'] = "Add Student";
        return view('admin.student.add', $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email||unique:users',
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:10',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50'
        ]);
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            $file = $request->file('profile_pic');
            $ext = $file->extension();
            $filename = date('Ymdhis').".".$ext;
            $file->move(public_path('upload/profile_student'), $filename);

            $student->profile_pic = $filename;
        }
        
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 2;
        $student->save();

        return redirect('admin/student/index')->with('success', 'Student Successfully Created');
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['getClass'] = ClassModel::getClass();
            $data['title'] = "Edit Student";
            return view('admin.student.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:10',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50'
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            if(!empty($student->getProfile())){
                unlink('upload/profile_student/'.$student->profile_pic);
            }
            $file = $request->file('profile_pic');
            $ext = $file->extension();
            $filename = date('Ymdhis').".".$ext;
            $file->move(public_path('upload/profile_student/'), $filename);

            $student->profile_pic = $filename;
        }
        
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if(!empty($request->password)){
            $student->password = Hash::make($request->password);
        }
        $student->save();

        return redirect('admin/student/index')->with('success', 'Student Successfully Updated');

    }
}