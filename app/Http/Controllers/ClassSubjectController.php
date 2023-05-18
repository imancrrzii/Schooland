<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['title'] = "Subject Assign";
        return view('admin.assign_subject.index', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['title'] = "Add Assign Subject";
        return view('admin.assign_subject.add', $data);
    }
    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $class_subject = new ClassSubjectModel;
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = Auth::user()->id;
                    $class_subject->save();
                }
            }
            return redirect('admin/assign_subject/index')->with('success', "Subject Successfully Assign");
        } else {
            return redirect()->back()->with('error', "Subject Failed Assign");
        }
    }

    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['title'] = "Edit Assign Subject";
            return view('admin.assign_subject.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $class_subject = new ClassSubjectModel;
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = Auth::user()->id;
                    $class_subject->save();
                }
            }
        }
        return redirect('admin/assign_subject/index')->with('success', "Subject Successfully Assign");
    }

    public function delete($id)
    {
        $class_subject = ClassSubjectModel::getSingle($id);
        $class_subject->is_delete = 1;
        $class_subject->save();

        return redirect()->back()->with('admin/assign_subject/index')->with('success', 'Class Successfully Deleted');
    }
}