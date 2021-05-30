<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Trainer;
use App\Learner;

use App\Course;
use App\CourseCategory;

use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get('trainer_email')){
            $User = DB::table('users')->where('email', Session::get('trainer_email'))->update(['trainer' => 1]);
            $u_name = DB::table('users')->where('email', Session::get('trainer_email'))->first();
            $trainer = new Trainer;
            $trainer->email = Session::get('trainer_email');
            $trainer->status = "Pending";
            $trainer->save();
            Session::put('trainer_email', 0);                             
        }         
        
        if(Session::get('user_email')){
            $user = DB::table('users')->where('email', Session::get('user_email'))->first();
            $learner = new Learner;
            $learner->email = Session::get('user_email');
            $learner->save(); 
            Session::put('user_email', 0);                             
        } 
        
        
        $trainer = Trainer::all();
        $users = User::all();
        $categories = CourseCategory::all();
        $courses = Course::all();


        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('trainer_value')){           
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            return view('trainer/home',compact('trainers'));
        }        

        if(Session::get('user_value')){
            return view('home',compact('trainer','users','categories','courses'));
        } 

        return redirect()->route('login');      

    }
 
    public function admin_index()
    {
        $trainer = Trainer::all();
        $users = User::all();
        $categories = CourseCategory::all();
        $courses = Course::all();

        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('trainer_value')){           
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            return view('trainer/home',compact('trainers'));
        }         

        if(Session::get('user_value')){
            return view('home',compact('trainer','users','categories','courses'));
        } 

        return redirect()->route('login');   
    }
    
    public function trainer_index()
    {
        $trainer = Trainer::all();
        $users = User::all();
        $categories = CourseCategory::all();
        $courses = Course::all();

        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('trainer_value')){           
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            return view('trainer/home',compact('trainers'));
        }         

        if(Session::get('user_value')){
            return view('home',compact('trainer','users','categories','courses'));
        } 

        return redirect()->route('login');  
    } 
     

    public function welcome()
    {
        $trainer = Trainer::all();
        $users = User::all();
        $categories = CourseCategory::all();
        $courses = Course::all();
        
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('trainer_value')){           
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            return view('trainer/home',compact('trainers'));
        }        

        if(Session::get('user_value')){
            return view('home',compact('trainer','users','categories','courses'));
        } 
        
        return view('welcome',compact('trainer','users','categories','courses'));
    }    

  
}
