<?php

use App\Http\Controllers\Api\ApiController;
use App\Models\Episode;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::apiResource('/serie', ApiController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/serie/upload', [ApiController::class, 'upload']);

    Route::get('/serie/{series}/seasons', function (Series $series) {
        return $series->seasons;
    });

    Route::get('/serie/{series}/episodes', function (Series $series) {
        // usar o metodo show
        return $series->episodes;
    });

    Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        $episode->save();

        return $episode;
    });
});

Route::post(
    '/login',
    function (Request $request) {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()
                ->json('Unauthorized', 401);
        }

        $user = Auth::user();
        
        $user->tokens()->delete();
        $token = $user->createToken('token', ['series:delete']);

        return response()
            ->json($token->plainTextToken, 201);
    }
);