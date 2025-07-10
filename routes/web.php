<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UpdateSurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use Maatwebsite\Excel\Facades\Excel; // <-- PAKAI INI!


Route::get('/', [LandingPageController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/user', [UserController::class, 'showUserDashboard'])
        ->name('user')->middleware('role:user');

    Route::get('/user/survey', [SurveyController::class, 'showSurvey'])
        ->name('/user/survey')->middleware('role:user');

    Route::get('/user/update', [UpdateSurveyController::class, 'showSurvey'])
        ->name('/user/update')->middleware('role:user');

    Route::resource('questions', QuestionController::class)->middleware('role:admin');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store')->middleware('role:admin');
    Route::post('/questions/update', [QuestionController::class, 'update'])->name('questions.update')->middleware('role:admin');

    Route::resource('survey', SurveyController::class)->middleware('role:user');
    Route::put('/survey/update  ', [SurveyController::class, 'update'])->name('survey.update')->middleware('role:user');



    Route::post('/store', [SurveyController::class, 'store'])
        ->name('/store')->middleware('role:user');


    Route::get('/admin', [AdminController::class, 'showAdminDashboard'])
        ->name('admin')->middleware('role:admin');



    Route::get('/admin/userDetail', [userDetailController::class, 'showUserDetail'])
        ->name('/admin/userDetail')->middleware('role:admin');

    Route::get('/admin/statistic', [StatisticController::class, 'showStatistic'])
        ->name('/admin/statistic')->middleware('role:admin');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});



Route::get('/export-tracer-status', [userDetailController::class, 'exportTracerByStatus']);
