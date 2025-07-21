<?php
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect()->route('students.index'); // Redirect to the students index page
});

Route::resource('students', StudentController::class);
Route::get('/students/{id}/detail', [StudentController::class, 'detail'])->name('students.detail');
