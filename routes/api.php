<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Auth\LoginRequest;
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

Route::apiResource('groups', GroupController::class);
Route::apiResource('organizations', OrganizationController::class);
Route::apiResource('posts', PostController::class);

Route::post('login', function (LoginRequest $request) {

    $user = User::where('email', $request->email)->first();

    if (! $user || $request->email != $user->email) {
        throw ValidationException::withMessages([
            'email' => 'The provided email is does not exist'
        ]);
    }

     //if (! $user || ! Hash::check($request->password, $user->password))
     if ($request->password != $user->password && $request->email === $user->email) {
        throw ValidationException::withMessages([
            'password' => 'The provided password is incorrect.'
        ]);
    }

    if (!$request->device_name) {
        throw ValidationException::withMessages([
            'device_name' => 'The device name is missing from the request'
        ]);
    }
 
    $token = $user->createToken($request->device_name)->plainTextToken;
    return response()->json([
        'token' => $token,
        'user' => $user
    ]);
});