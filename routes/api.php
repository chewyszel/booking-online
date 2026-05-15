<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\BookingController;

/*
| LOGIN (PUBLIC)
*/
Route::post('/login', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Login gagal'
        ], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'message' => 'Login berhasil',
        'token' => $token
    ]);
});

/*
| PROTECTED API (WAJIB LOGIN TOKEN)
*/
Route::middleware('auth:sanctum')->group(function () {

    // FIELD
    Route::get('/fields', [FieldController::class, 'apiIndex']);
    Route::get('/fields/{id}', [FieldController::class, 'apiShow']);

    // BOOKING
    Route::get('/bookings', [BookingController::class, 'apiIndex']);
    Route::post('/bookings', [BookingController::class, 'apiStore']);

});