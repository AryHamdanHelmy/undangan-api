<?php

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
