<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ChatController;
use Illuminate\Support\Facades\Broadcast;






    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[ChatController::class,'bringUser']);
        Route::get('/message/{sender_id}/{receiver_id}',[ChatController::class,'showMessage']);
        Route::post('/send-message',[ChatController::class,'sendMessage']);
        Route::post('/update-status',[ChatController::class,'updateStatus']);

    });

