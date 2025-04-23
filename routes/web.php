<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\RevisorController;
use App\Models\User;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PaymentController;


Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


// Rotta per visualizzare il modulo di creazione articolo (GET)
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

// Rotta per visualizzare contatti (GET) 
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

// Rotta per salvare il nuovo articolo (POST)
Route::post('/create/article', [ArticleController::class, 'create'])->name('create.article');


// Rotta per visualizzare tutti gli articoli
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');


// Rotta per visualizzare un singolo articolo
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');


// Rotta per il registro dell'utente
Route::post('register', [RegisterController::class, 'register'])->name('register');


// Rotta per il modulo di login (GET)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');


// Rotta per la gestione del login (POST)
Route::post('login', [AuthController::class, 'login']);




// Rotta per visualizzare gli articoli di una categoria specifica
Route::get('/category/{name}', [ArticleController::class, 'byCategory'])->name('byCategory');


// Rotte per gestire i revisori
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');


// Rotta per l'utente che vuole diventare revisore
Route::get('/revisor/about',[PublicController::class, "aboutRevisor"])->name('about.revisor');

Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');


// Rotta per rendere un utente revisore
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


//Rotta per Funzione SearchText
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

// Rotte per il footer
Route::get('/su_di_noi', [FooterController::class, 'su_di_noi'])->name('su_di_noi');
Route::get('/privacy', [FooterController::class, 'privacy'])->name('privacy');
Route::get('/cookie-policy', [FooterController::class, 'cookiePolicy'])->name('cookie.policy');
Route::view('/faqs', 'footer.faqs')->name('faqs');
Route::get('/note-legali', [FooterController::class, 'noteLegali'])->name('note.legali');

//Rotta CAMBIO LINGUA
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//Rotte PayPal Test
Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
Route::get('/paymentStory', [PaymentController::class, 'paymentIndex'])->middleware('auth')->name('paymentStory');