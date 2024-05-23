<?php

use App\Livewire\ArticleCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;

// PublicController
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// UserController
Route::get("/profile", [UserController::class, "profile"])->name("profile");
Route::get("/profile/{user}", [UserController::class, "userProfile"])->name("user.profile");

// RevisorController
Route::get("/dashboard/revisor", [RevisorController::class,"dashboard"])->name("revisor.dashboard")->middleware("isRevisor");
Route::patch("/accept/article/{article}", [RevisorController::class,"acceptArticle"])->name("revisor.accept")->middleware("isRevisor");
Route::patch("/reject/article/{article}", [RevisorController::class,"rejectArticle"])->name("revisor.reject")->middleware("isRevisor");
// aggiungere middleware test
Route::get('/revisor/candidates', [RevisorController::class, 'showCandidates'])->name('revisor.candidates')->middleware("isRevisor");
Route::post('/revisor/candidates/accept/{user}', [RevisorController::class, 'acceptCandidate'])->name('revisor.candidates.accept')->middleware("isRevisor");
Route::post('/revisor/candidates/reject/{user}', [RevisorController::class, 'rejectCandidate'])->name('revisor.candidates.reject')->middleware("isRevisor");


// Work with us
Route::get("/revisor/form", [RevisorController::class, "revisorForm"])->name('revisor.form')->middleware('auth');
Route::post("/revisor/send", [RevisorController::class, "sendEmail"])->name('send.email')->middleware("auth");
Route::get('/revisor/make/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// CategoryController
Route::get("/categoria/{category:name}", [CategoryController::class, "categoryShow"])->name("categoryShow");

// ArticleController
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');

Route::get('/article/detail/{article:title}', [ArticleController::class, 'show'])->name('article.detail');

// Search
Route::get('/ricerca/annuncio', [PublicController::class, 'searchArticles'])->name('article.search');

// Lang Route
Route::post("/lingua/{lang}", [PublicController::class,"setLanguage"])->name("setLocale");

// Test
Route::post('/livewire/message/article-create.image-cropped', ArticleCreate::class)->name('livewire.message.article-create.image-cropped');