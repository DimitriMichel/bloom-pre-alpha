<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Htt\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
        'user' => UserController::class,
        'groups' => GroupController::class,
        'organizations' => OrganizationController::class,
        'posts' => PostController::class
]);