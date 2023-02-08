<?php

use App\Http\Controllers\AttendStudentController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StudentExamsController;
use App\Http\Controllers\StudentProfileController;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });

    Route::resource('student_exams', StudentExamsController::class);
    Route::resource('profile-student', StudentProfileController::class);
    Route::resource('attendancesstd', AttendStudentController::class);
      //==============================library============================
      Route::get('download_file/{filename}',[ LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
      Route::resource('library', LibraryController::class);
  

});