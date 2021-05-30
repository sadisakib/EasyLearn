<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Trainer;
use App\Learner;
use App\Course;
use App\CourseCategory;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Welcome Page
Route::get('/', function () {

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
});

Auth::routes();

//Login Routes
Route::get('/login', 'LoginController@getLog')->name('login');
//Route::get('/register', 'LoginController@getRegister')->name('register');
//Route::get('/forget', 'LoginController@forgetUser')->name('get.forget');
Route::post('user-login', [
    'uses' => 'LoginController@login',
    'as' => 'user.login'
]);




//Trainer
Route::get('/trainer-register', 'TrainerController@trainerRegistration')->name('trainer.register');
Route::get('/trainer-profile', 'TrainerController@t_profileGet')->name('trainer.profileGet');
Route::post('/trainer-profile', 'TrainerController@t_profilePost')->name('trainer.profilePost');
Route::post('/trainer-photo', 'TrainerController@t_storeprofile')->name('trainer.storeprofile');
//Change password
Route::post('/trainer-changepassword', 'TrainerController@changePassPost')->name('trainer.changePassPost');
//Courses
Route::get('/trainer-courses', 'TrainerController@courseGet')->name('trainer.courseGet');
Route::post('/trainer-courses', 'TrainerController@addCourse')->name('trainer.addCourse');
Route::get('/trainer-courses-update{id}', 'TrainerController@updateCourseGet')->name('trainer.updateCourseGet');
Route::post('/trainer-courses-update', 'TrainerController@updateCoursePost')->name('trainer.updateCoursePost');
Route::get('/trainer-courses-delate{id}', 'TrainerController@deleteCourse')->name('trainer.deleteCourse');
//Orders
Route::get('/trainer-orders', 'TrainerController@orderGet')->name('trainer.orderGet');
Route::post('/trainer-orders-update', 'TrainerController@updateOrderPost')->name('trainer.updateOrderPost');

//ADMIN
Route::get('/admin-profile', 'AdminController@a_profileGet')->name('admin.profileGet');
Route::post('/admin-profile', 'AdminController@a_profilePost')->name('admin.profilePost');
Route::post('/admin-photo', 'AdminController@a_storeprofile')->name('admin.storeprofile');
//Change password
Route::post('/admin-changepassword', 'AdminController@changePassPost')->name('admin.changePassPost');
Route::get('/admin-trainers', 'AdminController@a_trainersGet')->name('admin.trainersGet');
Route::get('/admin-trainer{id}', 'AdminController@a_trainerGet')->name('admin.TrainerGet');
Route::post('/admin-update-trainer', 'AdminController@a_updateTrainer')->name('admin.updateTrainer');
//Cousrse Categories
Route::get('/admin-course-categories', 'AdminController@course_categoriesGet')->name('admin.course_categoriesGet');
Route::post('/admin-course-categories', 'AdminController@addCourseCategory')->name('admin.addCourseCategory');
Route::get('/admin-course-categories-update{id}', 'AdminController@updateCourseCategoryGet')->name('admin.updateCourseCategoryGet');
Route::post('/admin-course-categories-update', 'AdminController@updateCourseCategoryPost')->name('admin.updateCourseCategoryPost');
Route::get('/admin-course-categories-delate{id}', 'AdminController@deleteCourseCategory')->name('admin.deleteCourseCategory');
// Courses
Route::get('/admin-courses', 'AdminController@courseGet')->name('admin.courseGet');
Route::post('/admin-courses', 'AdminController@addCourse')->name('admin.addCourse');
Route::get('/admin-courses-update{id}', 'AdminController@updateCourseGet')->name('admin.updateCourseGet');
Route::post('/admin-courses-update', 'AdminController@updateCoursePost')->name('admin.updateCoursePost');
Route::get('/admin-courses-delate{id}', 'AdminController@deleteCourse')->name('admin.deleteCourse');


//Home Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin_index')->name('admin.home');
    Route::get('/trainer', 'HomeController@trainer_index')->name('trainer.home');
});



 //Learner
Route::get('/profile', 'LearnerController@l_profileGet')->name('learner.profileGet');
Route::post('/profile', 'LearnerController@l_profilePost')->name('learner.profilePost');
Route::post('/photo', 'LearnerController@l_storeprofile')->name('learner.storeprofile');
//Change password
Route::post('/changepassword', 'LearnerController@changePassPost')->name('learner.changePassPost');
//Courses
Route::get('/courses{id}', 'LearnerController@courseGet')->name('learner.courseGet');
Route::get('/buy-courses{id}', 'LearnerController@buyCourseGet')->name('learner.buyCourseGet');
Route::post('/courses-buy', 'LearnerController@buyPost')->name('learner.buyPost');
Route::get('/buy-history', 'LearnerController@buyGet')->name('learner.buyGet');