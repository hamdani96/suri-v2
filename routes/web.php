<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('storeQuiz', [HomeController::class, 'storeQuiz'])->name('storeQuiz');
Route::get('resultAnalysis/{id}', [HomeController::class, 'resultAnalysis'])->name('resultAnalysis');
Route::get('historyAnalysisQuiz', [HomeController::class, 'hisotryAnalysisQuiz'])->name('hisotryAnalysisQuiz');

// register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('store-register', [AuthController::class, 'storeRegister'])->name('store-register');

Route::get('check-role', [AuthController::class, 'checkRole'])->name('check-role');

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});

Route::prefix('hobby')->group(function() {
    // export
    Route::get('export', [HobbyController::class, 'export'])->name('hobby.export');
    Route::get('delete/{id}', [HobbyController::class, 'delete'])->name('hobby.delete');
});

Route::prefix('position')->group(function() {
    Route::get('export', [PositionController::class, 'export'])->name('position.export');
    Route::get('delete/{id}', [PositionController::class, 'delete'])->name('position.delete');
});

Route::prefix('training')->group(function() {
    Route::get('export', [TrainingController::class, 'export'])->name('training.export');
    Route::get('delete/{id}', [TrainingController::class, 'delete'])->name('training.delete');
});

Route::prefix('quiz')->group(function() {
    Route::get('export', [QuizController::class, 'export'])->name('quiz.export');
    Route::get('delete/{id}', [QuizController::class, 'delete'])->name('quiz.delete');
});

Route::prefix('user')->group(function() {
    Route::get('export', [UserController::class, 'export'])->name('user.export');
});

Route::prefix('analysis')->group(function() {
    Route::get('export', [AnalysisController::class, 'export'])->name('analysis.export');
});

Route::resource('hobby', HobbyController::class);
Route::resource('position', PositionController::class);
Route::resource('training', TrainingController::class);
Route::resource('quiz', QuizController::class);
Route::resource('user', UserController::class);
Route::resource('analysis', AnalysisController::class);
