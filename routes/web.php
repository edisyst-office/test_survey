<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/casa', '/home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.create');
Route::get('/survey/{survey:id}', [SurveyController::class, 'show'])->name('survey.show');
Route::delete('/survey/{survey:id}', [SurveyController::class, 'destroy'])->name('survey.delete');

Route::get('/survey/{survey}/take', [SurveyController::class, 'take'])->name('survey.take');
Route::post('/survey/{survey}/take', [SurveyController::class, 'takeStore'])->name('survey.take');


Route::get('/survey/{survey}/question/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/survey/{survey}/question/create', [QuestionController::class, 'store'])->name('question.create');
Route::delete('/survey/question/{question}', [QuestionController::class, 'destroy'])->name('question.delete');


