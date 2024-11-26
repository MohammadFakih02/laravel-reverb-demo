<?php
use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use App\Events\ContentUpdated;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/update-content', [ContentController::class, 'updateContent']);




Route::get('/test-broadcast', function () {
    broadcast(new ContentUpdated('Test content'))->toOthers();
    return 'Broadcast sent!';
});

