<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('grades.index');
});

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('grades', GradeController::class);