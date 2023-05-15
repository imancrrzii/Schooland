<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['title'] = "Class";
        return view('admin.class.index', $data);
    }
    public function add()
    {
        $data['title'] = "Add Class";
        return view('admin.class.add', $data);
    }
    public function insert(Request $request)
    {
        $class = new ClassModel;
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect('admin/class/index')->with('success', 'Class Successfully Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['title'] = "Edit Class";
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request){
        $class = ClassModel::getSingle($id);
        $class->name = $request->name;
        $class->status = $request->status;
        $class->save();

        return redirect('admin/class/index')->with('success', 'Class Successfully Updated');
    }
    public function delete($id){
        $class = ClassModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();

        return redirect()->back()->with('admin/class/index')->with('success', 'Class Successfully Deleted');
    }

    
}