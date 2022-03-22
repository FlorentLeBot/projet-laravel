<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AskController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [AskController::class, 'index'])->name('questions.index');
Route::get('question/{question}',[AskController::class, 'show'])->name('question.show');

Route::get('editer-une-question/{question}',[AskController::class, 'edit'])->name('question.edit');

Route::put('editer-une-question/{question}',[AskController::class, 'update'])->name('question.update');

Route::delete('supprimer-une-question/{question}',[AskController::class, 'delete'])->name('question.destroy');

/*
 * Routes authentification
 */ 
// Route::get('connexion',[LoginController::class, 'showLoginForm'])->name('login');
// Route::post('connexion',[LoginController::class, 'login'])->name('login');

// Route::get('inscription',[RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('inscription',[RegisterController::class, 'registrer']);

// Route::post('logout',[LoginController::class, 'logout'])->name('logout');

// Route::get('reinitialisation-du-mot-de-passe',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route::get('reinitialisation/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset',[ResetPasswordController::class, 'reset'])->name('password.email');

Route::get('connexion', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('connexion', [LoginController::class, 'login'])->name('login');

Route::get('inscription', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('inscription', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('reinitialisation-du-mot-de-passe', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reinitialisation/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'Reset'])->name('password.update');


Route::get('compte', [HomeController::class, 'index'])->name('home');
Route::put('compte', [HomeController::class, 'update'])->name('compte.update');

// créer une question

Route::get('creer-une-question', [AskController::class, 'create'])->name('question.create');
Route::post('creer-une-question', [AskController::class, 'store'])->name('question.store');

Route::post('answer/{question}', [AskController::class, 'answer'])->name('answer.store');


// Route::get('/compte', [HomeController::class, 'index'])->name('home');
// Route::put('/compte', [HomeController::class, 'update'])->name('compte.update');
