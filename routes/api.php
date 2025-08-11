<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TimeSlotsController;
use App\Http\Controllers\StudentFunctions\StudentFunctionsController;
use App\Http\Controllers\StudentFunctions\ContributionsController;
use App\Http\Controllers\StudentFunctions\AttendanceController;
use App\Http\Controllers\StudentFunctions\ClassGradesController;
use App\Http\Controllers\StudentFunctions\RemarksController;
use App\Http\Controllers\StudentFunctions\AssignmentsController;
use App\Http\Controllers\StudentFunctions\AssignmentMarksController;
use App\Http\Controllers\StudentFunctions\TestController;
use App\Http\Controllers\StudentFunctions\TestMarksController;
use App\Http\Controllers\ClassFunctions\ClassStudentsController;
use App\Http\Controllers\ClassFunctions\ClassScheduleController;
use App\Http\Controllers\ClassFunctions\ExamScheduleController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello from Laravel API']);
});
Route::get('/apitester', function () {
    return view('apiTesting'); // apitester.blade.php inside resources/views
})->name('apitester');
//roles
Route::post('/add_role', [RolesController::class, 'add'])->name('role.add');
Route::get('/get_roles', [RolesController::class, 'index'])->name('role.get');
Route::post('/update_role', [RolesController::class, 'update'])->name('role.update');
Route::post('/delete_role', [RolesController::class, 'delete'])->name('role.delete');
//users
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/add', [UsersController::class, 'add']);
Route::post('/users/update', [UsersController::class, 'update']);
Route::post('/users/delete', [UsersController::class, 'delete']);
//departments
Route::get('/departments', [DepartmentsController::class, 'index']);
Route::post('/departments/add', [DepartmentsController::class, 'add']);
Route::post('/departments/update', [DepartmentsController::class, 'update']);
Route::post('/departments/delete', [DepartmentsController::class, 'delete']);
//Teacher
Route::get('/teachers', [TeachersController::class, 'index']);
Route::post('/teachers/add', [TeachersController::class, 'add']);
Route::post('/teachers/update', [TeachersController::class, 'update']);
Route::post('/teachers/delete', [TeachersController::class, 'delete']);
//Parents
Route::get('/parents', [ParentsController::class, 'index']);
Route::post('/parents/add', [ParentsController::class, 'add']);
Route::post('/parents/update', [ParentsController::class, 'update']);
Route::post('/parents/delete', [ParentsController::class, 'delete']);
//Students
Route::get('/students', [StudentsController::class, 'index']);
Route::post('/students/add', [StudentsController::class, 'add']);
Route::post('/students/update', [StudentsController::class, 'update']);
Route::post('/students/delete', [StudentsController::class, 'delete']);
//Classes
Route::get('/classes', [ClassesController::class, 'index']);
Route::post('/classes/add', [ClassesController::class, 'add']);
Route::post('/classes/update', [ClassesController::class, 'update']);
Route::post('/classes/delete', [ClassesController::class, 'delete']);
//Subjects
Route::get('/subjects', [SubjectsController::class, 'index']);
Route::post('/subjects/add', [SubjectsController::class, 'add']);
Route::post('/subjects/update', [SubjectsController::class, 'update']);
Route::post('/subjects/delete', [SubjectsController::class, 'delete']);
//Time Slots
Route::get('/timeslots', [TimeSlotsController::class, 'index']);
Route::post('/timeslots/add', [TimeSlotsController::class, 'add']);
Route::post('/timeslots/update', [TimeSlotsController::class, 'update']);
Route::post('/timeslots/delete', [TimeSlotsController::class, 'delete']);



//Student Functions
///////////////////////////////////////
//Detention
Route::post('/detentions', [StudentFunctionsController::class, 'get_student_detention']);
Route::post('/detentions/add', [StudentFunctionsController::class, 'add_detention']);
Route::post('/detentions/update', [StudentFunctionsController::class, 'update_detention']);
Route::post('/detentions/delete', [StudentFunctionsController::class, 'delete']);
//Contributions
Route::get('/contributions', [ContributionsController::class, 'index']);
Route::post('/contributions/add', [ContributionsController::class, 'add']);
Route::post('/contributions/update', [ContributionsController::class, 'update']);
Route::post('/contributions/delete', [ContributionsController::class, 'delete']);
//Attendance
Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance/add', [AttendanceController::class, 'add']);
Route::post('/attendance/update', [AttendanceController::class, 'update']);
Route::post('/attendance/delete', [AttendanceController::class, 'delete']);
//Class Grades
Route::get('/classgrades', [ClassGradesController::class, 'index']);
Route::post('/classgrades/add', [ClassGradesController::class, 'add']);
Route::post('/classgrades/update', [ClassGradesController::class, 'update']);
Route::post('/classgrades/delete', [ClassGradesController::class, 'delete']);
//Remarks
Route::get('/remarks', [RemarksController::class, 'index']);
Route::post('/remarks/add', [RemarksController::class, 'add']);
Route::post('/remarks/update', [RemarksController::class, 'update']);
Route::post('/remarks/delete', [RemarksController::class, 'delete']);
//Assignments
Route::get('/assignments', [AssignmentsController::class, 'index']);
Route::post('/assignments/add', [AssignmentsController::class, 'add']);
Route::post('/assignments/update', [AssignmentsController::class, 'update']);
Route::post('/assignments/delete', [AssignmentsController::class, 'delete']);
//Assignment Marks
Route::get('/assignmentsmarks', [AssignmentMarksController::class, 'index']);
Route::post('/assignmentsmarks/add', [AssignmentMarksController::class, 'add']);
Route::post('/assignmentsmarks/update', [AssignmentMarksController::class, 'update']);
Route::post('/assignmentsmarks/delete', [AssignmentMarksController::class, 'delete']);
//Test
Route::get('/test', [TestController::class, 'index']);
Route::post('/test/add', [TestController::class, 'add']);
Route::post('/test/update', [TestController::class, 'update']);
Route::post('/test/delete', [TestController::class, 'delete']);
//Test Marks
Route::get('/test-marks', [TestMarksController::class, 'index']);
Route::post('/test-marks/add', [TestMarksController::class, 'add']);
Route::post('/test-marks/update', [TestMarksController::class, 'update']);
Route::post('/test-marks/delete', [TestMarksController::class, 'delete']);


//Class Functions
//////////////////////////////////////
//Class Students
Route::get('/classstudents', [ClassStudentsController::class, 'index']);
Route::post('/classstudents/add', [ClassStudentsController::class, 'add']);
Route::post('/classstudents/update', [ClassStudentsController::class, 'update']);
Route::post('/classstudents/delete', [ClassStudentsController::class, 'delete']);
//Class Schedule
Route::get('/class-schedule', [ClassScheduleController::class, 'index']);
Route::post('/class-schedule/add', [ClassScheduleController::class, 'add']);
Route::post('/class-schedule/update', [ClassScheduleController::class, 'update']);
Route::post('/class-schedule/delete', [ClassScheduleController::class, 'delete']);
//Exam Schedule
Route::get('/exam-schedule', [ExamScheduleController::class, 'index']);
Route::post('/exam-schedule/add', [ExamScheduleController::class, 'add']);
Route::post('/exam-schedule/update', [ExamScheduleController::class, 'update']);
Route::post('/exam-schedule/delete', [ExamScheduleController::class, 'delete']);