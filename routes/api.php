<?php
use App\Http\Controllers\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\Admin\GuestController as AdminGuestController;

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvitationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/invitations/{slug}', [InvitationController::class, 'show']);

Route::get('/guests/{token}', [GuestController::class, 'show']);
Route::patch('/guests/{token}/opened', [GuestController::class, 'markOpened']);

Route::get('/invitations/{invitationId}/guestbook', [GuestbookController::class, 'index']);
Route::post('/invitations/{invitationId}/guestbook', [GuestbookController::class, 'store']);

Route::middleware('auth:sanctum')->prefix('admin')->group(function(){
    Route::get('/invitations', [AdminInvitationController::class, 'index']);
    Route::post('/invitations', [AdminInvitationController::class, 'store']);
    Route::put('/invitations/{id}', [AdminInvitationController::class, 'update']);
    Route::delete('/invitations/{id}',[AdminInvitationController::class, 'destroy']);

    Route::post('/invitations/{invitationId}/guests', [AdminGuestController::class, 'store']);
    Route::post('/invitations/{invitationId}/guests/bulk', [AdminGuestController::class, 'bulkStore']);
});
