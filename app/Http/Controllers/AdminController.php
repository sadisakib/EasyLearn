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

use File;
use DB;


class AdminController extends Controller
{

    //Profile
    public function a_profileGet()
    {
        if(Session::get('admin_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();     
            if($user){
            return view('admin/profile',compact('user','admins'));  
            }  
        }
        return redirect()->route('login');          
    }

    public function a_profilePost(Request $request)
    {           
            $email = $request->email;
            $admins = DB::table('admins')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
            return redirect()->route('admin.profileGet');                   
    }

 
//Profile pic     
public function a_storeprofile(Request $request)
{
    $admin = Admin::find($request->id);
    if($admin->profileimage){
        if(file_exists($admin->profileimage)){
            unlink($admin->profileimage);
        }
    }        
    $profile_image = $request->file('p_file');
    $profile_destination = 'adminImages/'.time().'.'.$profile_image->extension();
    $profile_image->move(public_path('adminImages'),$profile_destination);
    $admin->profileimage = $profile_destination;
    $admin->save();
    return redirect()->route('admin.profileGet');
}   

//Change Password
 
public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $admins = DB::table('users')->where('email', Auth::user()->email)->first();
    if($admins){
        $dbpass = $admins->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
} 

//Mange Trainers
 
public function a_trainersGet(Request $request)
{
    if(Session::get('admin_value')){
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();
        $user = User::all(); 
        $trainers = Trainer::all();    
        if($user){
        return view('admin/trainers',compact('user','trainers','admins'));  
        }  
    }
    return redirect()->route('login');   
} 

public function a_trainerGet($id)
{
    if(Session::get('admin_value')){
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();
        $trainer = DB::table('trainers')->where('id', $id)->first();
        $user = DB::table('users')->where('email', $trainer->email)->first();   
        if($trainer){
        return view('admin/updateTrainer',compact('user','trainer','admins'));  
        }  
    }
    return redirect()->route('login');   
} 


public function a_updateTrainer(Request $request)
{
    
    $trainer = DB::table('trainers')->where('email', $request->email)->update([ 'status' => $request->status ]);
    if($trainer){
        return redirect()->route('admin.trainersGet');   
        }  
      
} 


    //Course categories
    public function course_categoriesGet()
    {
        if(Session::get('admin_value')){
            $courseCategories = CourseCategory::all();
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first();    
            if($user){
            return view('admin/course_categories',compact('courseCategories','admins','user'));  
            }  
        }
        return redirect()->route('login');          
    }

    //Add
    public function addCourseCategory(Request $request)
    {
        if(Session::get('admin_value')){
            $course_category = new CourseCategory;
            $course_category->name= $request->c_name;
            $course_category->save();
            return redirect()->route('admin.course_categoriesGet');
        }
        return redirect()->route('login');      
    }
    //Update
    public function updateCourseCategoryGet($id)
    {
        if(Session::get('admin_value')){
            $course_category = CourseCategory::find($id);
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            return view('admin/update_course_categories',compact('course_category','admins','user'));
        }
        return redirect()->route('login');      
    }
    public function updateCourseCategoryPost(Request $request)
    {
        if(Session::get('admin_value')){
            $course_category = CourseCategory::find($request->id);
            $course_category->name= $request->name;
            $course_category->save();
            return redirect()->route('admin.course_categoriesGet');
        }
        return redirect()->route('login');      
    }    
    //Delete
    public function deleteCourseCategory($id)
    {
        if(Session::get('admin_value')){
            $course_category = CourseCategory::find($id);
            $course_category->delete();
            return redirect()->route('admin.course_categoriesGet');
        }
        return redirect()->route('login');      
    }    


    //Courses 
    public function courseGet()
    {
        if(Session::get('admin_value')){

            $courseCategories = CourseCategory::all();
            $courses = Course::all();
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first();    
            if($user){
            return view('admin/courses',compact('courseCategories','courses','admins','user'));  
            } 

        }
        return redirect()->route('login');          
    }
    //Update
    public function updateCourseGet($id)
    {
        if(Session::get('admin_value')){
            $courseCategories = CourseCategory::all();
            $courses = Course::find($id);
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            if($user){
                return view('admin/updateCourse',compact('courseCategories','courses','admins','user'));  
                } 
        }
        return redirect()->route('login');      
    }
    public function updateCoursePost(Request $request)
    {
        if(Session::get('admin_value')){
            $course = Course::find($request->course_id);
            $course->status= $request->status;
            $course->save();
            return redirect()->route('admin.courseGet');
        }
        return redirect()->route('login');      
    }   


}
