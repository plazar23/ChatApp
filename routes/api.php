<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\ConversationController;
use App\Http\Resources\ConversationResource;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Resources\ParticipantResource;
use App\Http\Controllers\Api\MessageController;
use App\Http\Resources\MessageResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|middleware('auth:sanctum')->
*/

Route::apiResource('/users', UserController::class);
Route::apiResource('/conversations', ConversationController::class);
Route::apiResource('/participants', ParticipantController::class);
Route::apiResource('/messages', MessageController::class);