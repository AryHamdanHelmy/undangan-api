<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($invitationId){
    $entries = Guestbook::where('invitation_id', $invitationId)
        ->latest()
        ->paginate(10);

    return response()->json($entries);
    }

    public function store(Request $request, $invitationId){
    $validated = $request->validate([
        'guest_name'  => 'required|string|max:255',
        'attendance'  => 'required|in:hadir,tidak_hadir,ragu',
        'guest_count' => 'required|integer|min:1',
        'message'     => 'nullable|string|max:1000',
        //'guest_token' => 'nullable|string',
    ]);

    // $guestId = null;
    // if (!empty($validated['guest_token'])){
    //     $guestId = Guest::where('token', $validated['guest_token'])->value('id');
    // }

    $entry = Guestbook::create([
        'invitation_id' => $invitationId,
        'guest_id'      => $guestId,
        'guest_name'    => $validated['guest_name'],
        'attendance'    => $validated['attendance'],
        'guest_count'   => $validated['guest_count'],
        'message'       => $validated['message'] ?? null,
    ]);

    return response()->json($entry, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
