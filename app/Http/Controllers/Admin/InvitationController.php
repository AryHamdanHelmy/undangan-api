<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(){
        return response()->json(Invitation::latest()->get());
    }

    public function store(Request $request){
        $validated = $request->validate([
            'slug' => 'required|string|unique:invitations,slug',
            'groom_name' => 'required|string',
            'bride_name' => 'required|string',
            'groom_parents' => 'nullable|string',
            'bride_parents' => 'nullable|string',
            'theme' => 'nullable|string',
        ]);

        $invitation = Invitation::create($validated);

        return response()->json($invitation, 201);
    }

    public function update(Request $request, $id){
        $invitation = Invitation::findOrFail($id);

        $validated = $request->validate([
            'groom_name' => 'sometimes|string',
            'bride_name' => 'sometimes|string',
            'groom_parents' => 'nullable|string',
            'bride_parents' => 'nullable|string',
            'cover_photo' => 'nullable|string',
            'groom_photo' => 'nullable|string',
            'bride_photo' => 'nullable|string',
            'quote_text' => 'nullable|string',
            'quote_source' => 'nullable|string',
            'music_url' => 'nullable|string',
            'theme' => 'nullable|string',
        ]);

        $invitation->update($validated);

        return response()->json($invitation);
    }

    public function destroy($id){
        Invitation::findOrFail($id)->delete();
        return response()->json(['status' => 'deleted']);
    }
}

