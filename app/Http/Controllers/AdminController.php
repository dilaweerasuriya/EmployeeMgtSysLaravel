<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AddLeaves;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard.admin.index');
    }

    public function addStaff(){
        return view('dashboard.admin.addStaff');
    }

    public function storeStaff(Request $request){
        $request->validate([
            'first_name'          =>  'required',
            'last_name'           =>  'required',
            'image'               =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'dob'                 =>  'required',
            'gender'              =>  'required',
            'nic'                 =>  'required',
            'address'             =>  'required',
            'email'               =>  'required|email|unique:employees',
            'password'            =>  'required'

        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $file_name);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $file_name,
            'dob' => $request->dob,
            'age' => $request->age,
            'gender' => $request->gender,
            'nic' => $request->nic,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        User::create([
            'image' => $file_name,
            'name' => $request->first_name,
            'email' => $request->email,
            'role' => 2,
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);

        // $employee = new Employee;

        // $employee->first_name = $request->first_name;
        // $employee->last_name = $request->last_name;
        // $employee->image = $file_name;
        // $employee->dob = $request->dob;
        // $employee->age = $request->age;
        // $employee->gender = $request->gender;
        // $employee->nic = $request->nic;
        // $employee->address = $request->address;
        // $employee->email = $request->email;
        // $employee->password = $request->password;
        // $employee->save();

        // $user = new User;
        // $user->name = $request->first_name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        return redirect()->route('admin.viewStaff')->with('success', 'Employee Added successfully.');
    }

    public function editStaff($id)
    {
        $employee = Employee::find($id);
        return view('dashboard.admin.editStaff', compact('employee'));
    }

    public function viewStaff(){
        $data = Employee::all();
        return view('dashboard.admin.viewStaff', compact('data'));
       // return view('dashboard.admin.viewStaff');
    }

    public function updateStaff(Request $request, $id)
    {
        // $request->validate([
        //     'first_name'          =>  'required',
        //     'last_name'           =>  'required',
        //     'image'               =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        //     'dob'                 =>  'required',
        //     'age'                 =>  'required',
        //     'gender'              =>  'required',
        //     'nic'                 =>  'required',
        //     'address'             =>  'required',

        // ]);

        $file_name = $request->hidden_image;

        if($request->image != '')
        {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $image);
        }

        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->image = $file_name;
        $employee->dob = $request->dob;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->nic = $request->nic;
        $employee->address = $request->address;
        $employee->update();

        //$user = User::findOrFail($id);
        //$user->name = $request->first_name;
        //$user->save();

        return redirect()->route('admin.viewStaff')->with('success', 'Employee updated successfully.');
    }

    public function deleteStaff($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.viewStaff')->with('success', 'Employee Data deleted successfully');
    }

    public function leaveType(){
        return view('dashboard.admin.addLeaveTypes');
    }

    public function addLeaveType(Request $request){
        $existingLeave = AddLeaves::where('leave_type', $request->leave_type)->first();

        if ($existingLeave) {
            // Leave type already exists, show an error message
            return redirect()->route('admin.viewLeaveType')->with('error', 'Leave Type already exists.');
        }
        else {

            AddLeaves::create([
                'leave_type' => $request->leave_type,
                'leave_days' => $request->leave_days,
            ]);

            return redirect()->route('admin.viewLeaveType')->with('success', 'New Leave Type has been added successfully');

        }
    }

    public function viewLeaveType(){
        $data = AddLeaves::all();
        return view('dashboard.admin.viewLeaveTypes', compact('data'));
    }

    public function editLeaveType($id)
    {
        $addLeaves = AddLeaves::findOrFail($id);
        return view('dashboard.admin.editLeaveTypes', compact('addLeaves'));
    }

    public function updateLeaveType(Request $request, $id){
        $addLeaves = AddLeaves::findOrFail($id);
        $addLeaves->leave_type = $request->leave_type;
        $addLeaves->leave_days = $request->leave_days;

        $addLeaves->save();

        return redirect()->route('admin.viewLeaveType')->with('success', 'Leave Type has been updated successfully');
    }

    public function deleteLeaveType($id)
    {
        $addLeaves = AddLeaves::findOrFail($id);
        $addLeaves->delete();
        return redirect()->route('admin.viewLeaveType')->with('success', 'Leave Type deleted successfully');
    }

    public function viewLeaveReq(){
        $data = Leaves::all();
        return view('dashboard.admin.leaveReq', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
