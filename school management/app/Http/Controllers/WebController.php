<?php

namespace App\Http\Controllers;

use App\Mail\EnrollConfirmationMail;
use App\Models\Enroll;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\HttpFoundation\Session\Storage\save;
use Session;

class WebController extends Controller
{
    private $subject;
    private $subjects;

    private $student;
    private $enroll;

    private $data = [];

    private $check = false;

    public function index()
    {
        $this->subjects = Subject::where('status',1)->orderBy('id','desc')->get();
        return view('front.home.home',['subjects'=>$this->subjects]);
    }
    public function detail($id)
    {
        $this->subject = Subject::find($id);
        if (Session::get('student_id'))
        {
          $this->enroll = Enroll::where('student_id',Session::get('student_id'))->where('subject_id',$id) ->first();
          if ($this->enroll)
          {
              $this->check = true;
          }
        }

        return view('front.home.details',['subject'=> $this->subject,'check'=>$this->check]);
    }
    public function enroll($id)
    {
        if (Session::get('student_id'))
        {
            $this->enroll = new Enroll();
            $this->enroll->subject_id       = $id;
            $this->enroll->student_id       = Session::get('student_id');
            $this->enroll->enroll_date      = date('Y-m-d');
            $this->enroll->enroll_timestamp = strtotime('Y-m-d');
            $this->enroll->save();

            //E-mail
            $this->data = [
                'name'    =>  Session::get('student_name'),
                'user_id' =>  Session::get('student_email') ,
                'password'=>  Session::get('student_mobile'),
            ];
            Mail::to(Session::get('student_email'))->send(new EnrollConfirmationMail($this->data));

            return redirect('student-dashboard')->with('message','new course registration successfully');
        }
        else
        {
            return view('front.course.enroll' ,['id'=> $id]);
        }

    }
    public function newEnroll(Request $request ,$id)
    {
        $this->student = Student::where('email',$request->email)->first();
        if ($this->student)
        {
            $this->enroll = Enroll::where('student_id',$this->student->id)->where('subject_id', $id)->first();
            if ($this->enroll)
            {
                return redirect('/course-detail/'.$id)->with('message','You are already enroll this course  ');
            }

        }
        else
        {
            //shift to model
            $this->student = new  Student();
            $this->student->name = $request->name;
            $this->student->email = $request->email;
            $this->student->password = bcrypt($request->mobile);
            $this->student->mobile = $request->mobile;
            $this->student->save();
        }



       Session::put('student_id', $this->student->id);
       Session::put('student_name', $this->student->name);
       Session::put('student_email', $this->student->email);
       Session::put('student_mobile', $this->student->mobile);

        //Shift to model
       $this->enroll = new Enroll();
       $this->enroll->subject_id         = $id;
       $this->enroll->student_id         =$this->student->id;
       $this->enroll->enroll_date        = date('Y-m-d');
       $this->enroll->enroll_timestamp   = strtotime(date('Y-m-d'));
       $this->enroll->save();

       //E-mail
        $this->data = [
            'name'    =>  $request->name,
            'user_id' =>  $request->email,
            'password'=>   $request->mobile,
        ];
       Mail::to($request->email)->send(new EnrollConfirmationMail($this->data));

        //--Email--//

        return redirect('/course-detail/'.$id)->with('message','Registration successfully complete ');
    }
}
