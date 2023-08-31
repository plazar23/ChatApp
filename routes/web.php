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
Route::post('/conversations', 'ConversationController@store');     // Dodajem store metodu u ConversationController
Route::get('/conversations/{id}', [ConversationController::class ,'show']) -> name('conversations.show'); 
Route::delete('/pizzas/{id}', 'PizzaController@destroy');

Route::get('/participants', 'ParticipantController@index');      // Dodajem index metodu u ParticipantController
Route::get('/participants/{id}', 'ParticipantController@show');  // Dodajem show metodu u ParticipantController
Route::post('/participants', 'ParticipantController@store');     // Dodajem store metodu u ParticipantController

Route::get('/messages', 'MessageController@index');      // Dodajem index metodu u MessageController
Route::get('/messages/{id}', 'MessageController@show');  // Dodajem show metodu u MessageController
Route::post('/messages', 'MessageController@store');     // Dodajem store metodu u MessageController

Route::get('/pizzas', 'PizzaController@index');
Route::get('/pizzas/create', 'PizzaController@create');
Route::post('pizzas', 'PizzaController@store');
Route::get('/pizzas/{id}', 'PizzaController@show');
Route::delete('/pizzas/{id}', 'PizzaController@destroy');
// Auth::routes();

require __DIR__.'/auth.php';

