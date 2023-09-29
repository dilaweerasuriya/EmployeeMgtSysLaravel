<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if (Auth::id()) {
           
            $status = Auth()->user()->status;
            $role = Auth()->user()->role;

            if($status == 1)
                if($role == 1){
                    //return view('admin/home');
                    return app('App\Http\Controllers\AdminController')->index();
                }
                else if($role == 2){
                    //return view('employee/home');
                    return app('App\Http\Controllers\EmployeeController')->index();
                }
                else{
                    return view('auth/login');
                }
        } else{
            session()->flush();
                return redirect()->back()->with('error', 'Your account is inactive!');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'email' =>'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))) {
            if(auth()->user()->role==1){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role==2){
                return redirect()->route('employee.dashboard');
            }
        }
        else{
            return redirect()->route('login')->with('error','Invalid email or password');
        }
    }

    
}
