<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {
            return view('admin.dashboard', $data);
        } else if (Auth::user()->user_type == 2) {
            return view('student.dashboard', $data);
        } else if (Auth::user()->user_type == 3) {
            return view('teacher.dashboard', $data);
        } else if (Auth::user()->user_type == 4) {
            return view('parent.dashboard', $data);
        }
    }
}