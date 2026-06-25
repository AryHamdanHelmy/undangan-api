<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    private function generateUniqueToken(): string{
        do {
            $token = Str::upper(Str::random(6));
        } while (Guest::where('token', $token)->exists());

        return $token;
    }

    public function store(Request $request, $invitationId){
        $validated = $request->validate(['name' => 'required|string']);

        $guest = Guest::create([
            'invitation_id' => $invitationId,
            'name' => $validated['name'],
            'token' => $this->generateUniqueToken(),
        ]);

        return response()->json($guest, 201);
    }

    public function bulkStore(Request $request, $invitationId){
        $validated = $request->validate([
            'names' => 'required|array',
            'names.*' => 'required|string',
        ]);

        $guests = collect($validated['names'])->map(function ($name) use ($invitationId) {
            return Guest::create([
                'invitation_id' => $invitationId,
                'name' => $name,
                'token' => $this->generateUniqueToken(),
            ]);
        });

        return response()->json($guests, 201);
    }
}