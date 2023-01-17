<?php

use App\Http\Controllers\TeacherStudentController;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
        return view('pages.Teachers.dashboard.dashboard',$data);
    });

    Route::get('student',[TeacherStudentController::class,'index'])->name('student.index');

    Route::get('sections',[TeacherStudentController::class,'sections'])->name('sections');
    Route::post('attendance',[TeacherStudentController::class,'attendance'])->name('attendance');
    Route::get('attendance_report',[TeacherStudentController::class,'attendanceReport'])->name('attendance.report');
    Route::post('attendance_report',[TeacherStudentController::class,'attendanceSearch'])->name('attendance.search');


});