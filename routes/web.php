<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [QuestionController::class, 'gethomequestion'])->name('home');

Route::get('/search-home', [QuestionController::class, 'searchHome'])->name('search.home');


Route::get('/question/{slug}', [QuestionController::class, 'detailquestion'])->name('question.detail');
    
Route::get('/askquestion', [QuestionController::class, 'askquestion'])->name('askquestion')->middleware('LoginMiddleware');

Route::get('/contact', [AdminController::class, 'contact'])->name('contact')->middleware('LoginMiddleware');
    
Route::post('/createquestion', [QuestionController::class, 'createquestion'])->name('question.create')->middleware('LoginMiddleware');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/submit-register', [UserController::class, 'submitRegister'])->name('submit-register');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('LoginMiddleware');

Route::get('/category/{slug}',[QuestionController::class, 'categoryFilter'])->name('category.filter');

Route::get('/hashtag/{hashtag_id}/{user_id}',[QuestionController::class, 'HashtagFilter'])->name('hashtag.filter');

Route::get('/answer/{id}',[QuestionController::class, 'answer'])->name('question.answer');

Route::post('/answer/{parent_id}',[QuestionController::class, 'repAnswer'])->name('rep.answer')->middleware('LoginMiddleware');

Route::get('/myinfo',[UserController::class, 'myInfo'])->name('user.myinfo')->middleware('LoginMiddleware');

Route::get('/userinfo/{user_id}',[UserController::class, 'userInfo'])->name('user.userinfo');


Route::put('/edit-myinfo',[UserController::class, 'editMyInfo'])->name('user.edit.myinfo')->middleware('LoginMiddleware');

Route::get('/like/{question_id}',[QuestionController::class, 'like'])->name('question.like')->middleware('LoginMiddleware');

Route::get('/dislike/{question_id}',[QuestionController::class, 'disLike'])->name('question.dislike')->middleware('LoginMiddleware');

Route::get('/singin-facebook', [UserController::class, 'singinWithFacebook'])->name('signin.facebook');

Route::get('/singin-google', [UserController::class, 'singinWithGoogle'])->name('signin.google');



















