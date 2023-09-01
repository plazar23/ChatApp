<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController; // Ukljucujem ConversationController
use App\Http\Controllers\ParticipantController; // Ukljucujem ParticipantController
use App\Http\Controllers\MessagesController;     // Ukljucujem MessageController
use App\Http\Controllers\UserController; // Ukljucujem UserController
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/conversations', [ConversationController::class, 'index']) ->name('conversations.index');
Route::get('/conversations/create', [ConversationController::class, 'create']) ->name('conversations.create');
Route::post('/conversations', [ConversationController::class, 'store']) ->name('conversations.store');
Route::get('/conversations/{id}', [ConversationController::class ,'show']) -> name('conversations.show'); 
Route::delete('/pizzas/{id}', [ConversationController::class , 'destroy']) -> name('conversations.destroy');

Route::get('/participants', [ParticipantController::class, 'index']) ->name('participants.index');
Route::get('/participants/create', [ParticipantController::class, 'create']) ->name('participants.create'); 
Route::post('/participants', [ParticipantController::class, 'store']) ->name('participants.store'); 
Route::get('/participants/{id}', [ParticipantController::class ,'show']) -> name('participants.show');  
Route::delete('/participants/{id}', [ParticipantController::class , 'destroy']) -> name('participants.destroy');

Route::get('/messages', [MessagesController::class, 'index']) ->name('messages.index');
Route::get('/messages/create', [MessagesController::class, 'create']) ->name('messages.create');
Route::post('/messages', [MessagesController::class, 'store']) ->name('messages.store');
Route::get('/messages/{id}', [MessagesController::class ,'show']) -> name('messages.show');
Route::delete('/messages/{id}', [MessagesController::class , 'destroy']) -> name('messages.destroy');

// Route::get('/pizzas', 'PizzaController@index');
// Route::get('/pizzas/create', 'PizzaController@create');
// Route::post('pizzas', 'PizzaController@store');
// Route::get('/pizzas/{id}', 'PizzaController@show');
// Route::delete('/pizzas/{id}', 'PizzaController@destroy');
// Auth::routes();

require __DIR__.'/auth.php';

