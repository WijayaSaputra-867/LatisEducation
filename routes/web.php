<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return redirect()->route('students.index');
    });

    Route::resource('students', StudentController::class)->except('show');
    Route::get('students/export', [StudentController::class, 'export'])->name('students.export');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');
});
