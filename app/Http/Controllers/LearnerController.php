<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Learner;
use App\Admin;

use App\Course;
use App\CourseCategory;
use App\Order;

use File;
use DB;

class LearnerController extends Controller
{
    public function l_profileGet()
    { 
        
        if(Session::get('user_value')){
            $learners = DB::table('learners')->where('email', Auth::user()->email)->first();
            return view('profile',compact('learners'));  
            }  
        return redirect()->route('login');    
        
      
    }
    public function l_profilePost(Request $request)
    {     
        if(Session::get('user_value')){
            $email = $request->email;
            $learners = DB::table('learners')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
            return redirect()->route('learner.profileGet');
            }  
        return redirect()->route('login');  
          
                    
    }
    //Profile pic     
    public function l_storeprofile(Request $request)
    {

        if(Session::get('user_value')){
                $learners = DB::table('learners')->where('email', Auth::user()->email)->first();
                $learner = Learner::find($request->id);
                if($learner->profileimage){
                    if(file_exists($learner->profileimage)){
                        unlink($learner->profileimage);
                    }
                }        
                $profile_image = $request->file('p_file');
                $profile_destination = 'learnerImages/'.time().'.'.$profile_image->extension();
                $profile_image->move(public_path('learnerImages'),$profile_destination);
                $learner->profileimage = $profile_destination;
                $learner->save();
                return redirect()->route('learner.profileGet');
            }  
        return redirect()->route('login');   
        

    }  
    //Change Password 
    public function changePassPost(Request $request)
    {


        if(Session::get('user_value')){
                $current_pass = $request->c_pass;
                $new_pass = Hash::make($request->n_pass);
                $learners = DB::table('users')->where('email', Auth::user()->email)->first();
                if($learners){
                    $dbpass = $learners->password;
                }
                if(Hash::check($current_pass, $dbpass)){
                    $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
                    return redirect()->back()->withErrors([' Password changed ! ']);
                }
                return redirect()->back()->withErrors([' Current password credential ! ']);   
            }  
        return redirect()->route('login');  


    } 

    //All Course
    public function courseGet($id)
    {
            $c_courses = Course::all();
            $courseCategories = CourseCategory::all();

            return view('courses',compact('c_courses','courseCategories','id')); 
    } 
    //Buy
    public function buyCourseGet($id)
    {
        if(Session::get('user_value')){
            $c_owner = Course::find($id);
            $trainer = DB::table('trainers')->where('email', $c_owner->owner)->first();

            $phone = $trainer->phone;
            $email = $trainer->email;
            $price = $c_owner->price;

            $c_courses = Course::all();
            $courseCategories = CourseCategory::all();

            return view('buyCourse',compact('c_courses','courseCategories','id','phone','email','price')); 
        }
        return redirect()->route('login');
    }
    //Post
    public function buyPost(Request $request)
    {
            if(Session::get('user_value')){
                $orders = new Order;
                $orders->learner_email= Auth::user()->email;
                $orders->trainer_email= $request->c_owner;

                $orders->course= $request->c_id;
                $orders->price= $request->c_price;
                $orders->trainer_bkash= $request->trainer_bkash;
                $orders->learner_bkash= $request->learner_bkash;
                $orders->transaction_id= $request->t_id;
                $orders->payment= "Pending";
                $orders->save();
                return redirect()->route('learner.buyGet');
            }
            return redirect()->route('login');      
    }
    //Buy
    public function buyGet()
    {
            if(Session::get('user_value')){
                $orders = Order::all();
                $c_courses = Course::all();
                return view('orders',compact('c_courses','orders')); 
            }
            return redirect()->route('login');
    }

}
