<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    private $check;
    private $user;
    public function login ()
    {
        return view('front.auth.login');
    }
    public function register()
    {
        return view('front.auth.register');
    }
    public function newLogin(Request $request)
    {
        if ($request->check == 1)
        {
           $this->user = Teacher::where('email',$request->email)->where('status',1)->first();
           if ($this->user)
           {
               if(password_verify($request->password, $this->user->password))
               {
                   Session::put('user_id',$this->user->id);
                   Session::put('user_name',$this->user->name);
                   Session::put('user_image',$this->user->image);

                   return redirect('/teacher-dashboard');
               }
               else
               {
                   return redirect()->back()->with('message','Password is invalid');
               }
           }
            else
            {
                return redirect()->back()->with('message','email address is invalid or status is inactive');
            }


        }
        elseif ($request->check == 0)
        {
            $this->user =Student::where('email',$request->email)->where('status',1)->first();
            if ($this->user)
            {
                if (password_verify($request->password, $this->user->password))
                {
                    Session::put('student_id',$this->user->id);
                    Session::put('student_name',$this->user->name);
                    Session::put('student_email',$this->user->email);
                    Session::put('student_image',$this->user->image);

                    return redirect('/student-dashboard');
                }
                else
                {
                    return redirect()->back()->with('message','Password is invalid');
                }
            }
            else
            {
                return redirect()->back()->with('message','Email address is invalid or status inactive');
            }
        }
    }
    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('User_image');

        return redirect('/');
    }

    public function studentLogout(Request $request)
    {
        Session::forget('student_id');
        Session::forget('student_name');
        Session::forget('student_email');
        Session::forget('student_mobile');

        return redirect('/');
    }
    public function newRegistration(Request $request)
    {
       $this->user = Student::newStudent($request);

        Session::put('student_id',$this->user->id);
        Session::put('student_name',$this->user->name);
        Session::put('student_email',$this->user->email);

        return redirect('/student-dashboard')->with('message','Your registration Complete.');
    }


}
