<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['middleware'=> 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

//Auth::logout();

//Route::post('logout',[AdminController::class,'logout'])->name('logout');

//Route::get('logout',[LogoutController::class,'index'])->name('admin.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('addStaff',[AdminController::class,'addStaff'])->name('admin.addStaff');
    Route::post('addStaff',[AdminController::class,'storeStaff'])->name('admin.createStore');
    Route::get('viewStaff',[AdminController::class,'viewStaff'])->name('admin.viewStaff');
    Route::get('editStaff.{id}',[AdminController::class,"editStaff"])->name('admin.editStaff');
    Route::put('updateStaff.{id}', [AdminController::class, 'updateStaff'])->name('admin.updateStaff');
    Route::delete('deleteStaff.{id}', [AdminController::class, 'deleteStaff'])->name('admin.deleteStaff');
    Route::get('addLeaveType',[AdminController::class,'leaveType'])->name('admin.leaveType');
    Route::post('addLeaveType',[AdminController::class,'addLeaveType'])->name('admin.addLeaveType');
    Route::get('viewLeaveType',[AdminController::class,'viewLeaveType'])->name('admin.viewLeaveType');
    Route::get('editLeaveType.{id}', [AdminController::class, 'editLeaveType'])->name('admin.editLeaveType');
    Route::put('updateLeaveType.{id}', [AdminController::class, 'updateLeaveType'])->name('admin.updateLeaveType');
    Route::delete('editLeaveType.{id}', [AdminController::class, 'deleteLeaveType'])->name('admin.deleteLeaveType');
    Route::get('viewLeaveReq',[AdminController::class,'viewLeaveReq'])->name('admin.viewLeaveReq');
});

Route::group(['prefix'=>'employee', 'middleware'=>['isEmployee','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
    Route::get('addLeaveReq',[EmployeeController::class,'addLeaveReq'])->name('employee.LeaveReq');
    Route::post('addLeaveReq',[EmployeeController::class,'storeLeaveReq'])->name('employee.addLeaveReq');
    Route::get('viewLeaveHistory',[EmployeeController::class,'viewLeaveReq'])->name('employee.viewLeaveHistory');
    Route::get('profile',[EmployeeController::class,'profile'])->name('employee.profile');}
);
