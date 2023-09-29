<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddLeaves;
use App\Models\Leaves;

class EmployeeController extends Controller
{
    public function index(){
        return view('dashboard.employee.index');
    }

    public function addLeaveReq(){
        $data = AddLeaves::all();
        return view('dashboard.employee.addLeaveReq', compact('data'));
    }

    public function storeLeaveReq(Request $request){
        Leave::create([
            'user_id' => Auth()->id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'leave_days' => $request->leave_days,
        ]);
        return view('dashboard.employee.addLeave');
    }

    public function viewLeaveReq(){
        return view('dashboard.employee.viewLeaveReq');
    }

    public function profile(){
        return view('dashboard.employee.profile');
    }
}

