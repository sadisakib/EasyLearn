<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Trainer;
use App\Learner;
use App\Admin;

use App\Course;
use App\CourseCategory;
use App\Order;

use File;
use DB;

class TrainerController extends Controller
{
    
    public function trainerRegistration()
    {
        return view('trainer/trainerRegistration');
    }
    
    //Profile
    public function t_profileGet()
    {
        if(Session::get('trainer_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();     
            if($user){
            return view('trainer/profile',compact('user','trainers'));  
            }  
        }
        return redirect()->route('login');          
    }
    public function t_profilePost(Request $request)
    {       
            $email = $request->email;
            $trainers = DB::table('trainers')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);

            $trainer = Trainer::find($request->id);

            if($request->file('n_id')){
                if($trainer->n_id){
                    if(file_exists($trainer->n_id)){
                        unlink($trainer->n_id);
                    }
            }             
            $NID = $request->file('n_id');
            $NID_destination = 'trainerImages/TrainerID/'.time().'.'.$NID->extension();
            $NID->move(public_path('trainerImages/TrainerID'),$NID_destination);
            $trainer->n_id = $NID_destination;
            $trainer->save();           

            }
            return redirect()->route('trainer.profileGet');                    
    }
    //Profile pic     
    public function t_storeprofile(Request $request)
    {
        $trainer = Trainer::find($request->id);
        if($trainer->profileimage){
            if(file_exists($trainer->profileimage)){
                unlink($trainer->profileimage);
            }
        }        
        $profile_image = $request->file('p_file');
        $profile_destination = 'trainerImages/'.time().'.'.$profile_image->extension();
        $profile_image->move(public_path('trainerImages'),$profile_destination);
        $trainer->profileimage = $profile_destination;
        $trainer->save();
        return redirect()->route('trainer.profileGet');
    }   
    //Change Password  
    public function changePassPost(Request $request)
    {
        $current_pass = $request->c_pass;
        $new_pass = Hash::make($request->n_pass);
        $trainers = DB::table('users')->where('email', Auth::user()->email)->first();
        if($trainers){
            $dbpass = $trainers->password;
        }
        if(Hash::check($current_pass, $dbpass)){
            $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
            return redirect()->back()->withErrors([' Password changed ! ']);
        }
        return redirect()->back()->withErrors([' Current password credential ! ']);   
    }


    //Courses
    public function courseGet()
    {
        if(Session::get('trainer_value')){
            $courseCategories = CourseCategory::all();
            $courses = Course::all();
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first();    
            if($user){
            return view('trainer/courses',compact('courseCategories','courses','trainers','user'));  
            }  
        }
        return redirect()->route('login');          
    }
    //Add
    public function addCourse(Request $request)
    {
        if(Session::get('trainer_value')){
            $course = new Course;
            $course->title= $request->title;

            $banner = $request->file('banner');
            $banner_destination = 'courseImages/'.time().'.'.$banner->extension();
            $banner->move(public_path('courseImages'),$banner_destination);
            $course->banner = $banner_destination;

            $course->category= $request->category;
            $course->owner= $request->owner;
            $course->overview= $request->overview;
            $course->price= $request->price;
            $course->status= "Pending";
            $course->preview= $request->preview;
            $course->save();
            return redirect()->route('trainer.courseGet');
        }
        return redirect()->route('login');      
    }
    //Update
    public function updateCourseGet($id)
    {
        if(Session::get('trainer_value')){
            $courseCategories = CourseCategory::all();
            $courses = Course::find($id);
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            if($user){
                return view('trainer/updateCourse',compact('courseCategories','courses','trainers','user'));  
                } 
        }
        return redirect()->route('login');      
    }
    public function updateCoursePost(Request $request)
    {
        if(Session::get('trainer_value')){
            $course = Course::find($request->course_id);
            $course->title= $request->title;

            if($request->file('banner')){
                if($course->banner){
                    if(file_exists($course->banner)){
                        unlink($course->banner);
                    }
                } 
                $banner = $request->file('banner');
                $banner_destination = 'courseImages/'.time().'.'.$banner->extension();
                $banner->move(public_path('courseImages'),$banner_destination);
                $course->banner = $banner_destination;
            }
            else{
                $course->banner = $request->b_banner; 
            }

            $course->category= $request->category;
            $course->overview= $request->overview;
            $course->price= $request->price;
            $course->preview= $request->preview;
            $course->save();
            return redirect()->route('trainer.courseGet');
        }
        return redirect()->route('login');      
    }    
    //Delete
    public function deleteCourse($id)
    {
        if(Session::get('trainer_value')){
            $course = Course::find($id);
            if($course->banner){
                if(file_exists($course->banner)){
                    unlink($course->banner);
                }
            } 
            
            $course->delete();
            return redirect()->route('trainer.courseGet');
        }
        return redirect()->route('login');      
    }
    //Orders
    public function orderGet()
    {
        if(Session::get('trainer_value')){
            $orders = Order::all();  
            $c_courses = Course::all();
            $trainers = DB::table('trainers')->where('email', Auth::user()->email)->first(); 
            return view('trainer/orders',compact('c_courses','orders','trainers')); 
        }
        return redirect()->route('login');
    } 
    //Update
    public function updateOrderPost(Request $request)
    {
        if(Session::get('trainer_value')){
            $orders = Order::find($request->order_id);
            $orders->payment = $request->order_payment;
            $orders->save();
            return redirect()->route('trainer.orderGet');
        }
        return redirect()->route('login');      
    }  

}
