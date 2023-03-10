<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "todo"], static function () {
    Route::get("/", [TodoController::class, "index"]);
    Route::get("/view/{todo}", [TodoController::class, "view"]);
    Route::post("/create", [TodoController::class, "create"]);
    Route::patch("/update/{todo}", [TodoController::class, "update"]);
    Route::delete("/delete/{todo}", [TodoController::class, "delete"]);
});
