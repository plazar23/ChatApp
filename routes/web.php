<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationsController; // Ukljucujem ConversationsController
use App\Http\Controllers\ParticipantsController; // Ukljucujem ParticipantsController
use App\Http\Controllers\MessagesController;     // Ukljucujem MessagesController
//use App\Http\Controllers\UsersController;        // Ukljucujem UsersController
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

Route::get('/conversations', [ConversationsController::class, 'index'])->name('conversations.index');      // Dodajem index metodu u ConversationsController
Route::get('/conversations/{id}', 'ConversationsController@show');  // Dodajem show metodu u ConversationsController
Route::post('/conversations', 'ConversationsController@store');     // Dodajem store metodu u ConversationsController

Route::get('/participants', [ParticipantsController::class, 'index'])->name('participants.index');      // Dodajem index metodu u ParticipantsController
Route::get('/participants/{id}', 'ParticipantsController@show');  // Dodajem show metodu u ParticipantsController
Route::post('/participants', 'ParticipantsController@store');     // Dodajem store metodu u ParticipantsController

Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');      // Dodajem index metodu u MessagesController
Route::get('/messages/{id}', 'MessagesController@show');  // Dodajem show metodu u MessagesController
Route::post('/messages', 'MessagesController@store');     // Dodajem store metodu u MessagesController

Route::get('/users', [UsersController::class, 'index'])->name('users.index');      // Dodajem index metodu u UsersController
Route::get('/users/{id}', 'UsersController@show');  // Dodajem show metodu u UsersController
Route::post('/users', 'UsersController@store');     // Dodajem store metodu u UsersController

require __DIR__.'/auth.php';

