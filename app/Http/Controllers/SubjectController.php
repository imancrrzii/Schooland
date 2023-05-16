<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index(){
        $data['getRecord'] = SubjectModel::getRecord();
        $data['title'] = "Subject";
        return view('admin.subject.index', $data);
    }
    public function add()
    {
        $data['title'] = "Add Subject";
        return view('admin.subject.add', $data);
    }
    public function insert(Request $request)
    {
        $subject = new SubjectModel;
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->created_by = Auth::user()->id;
        $subject->save();

        return redirect('admin/subject/index')->with('success', 'Subject Successfully Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request){
        $subject = SubjectModel::getSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->save();

        return redirect('admin/subject/index')->with('success', 'Subject Successfully Updated');
    }
    public function delete($id){
        $subject = SubjectModel::getSingle($id);
        $subject->is_delete = 1;
        $subject->save();

        return redirect()->back()->with('admin/subject/index')->with('success', 'Subject Successfully Deleted');
    }
}
