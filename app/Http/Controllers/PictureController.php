<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;


class PictureController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'path' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'accomodation_id' => 'nullable|exists:accomodations,id',
            'ad_id' => 'nullable|exists:ads,id',
        ]);

        $picture = Picture::create($validated);

        return response()->json($accomodation, 201);

    }

    public function update(Request $request, $id) {

        $picture = Ad::findOrFail($id);

        $validated = $request->validate([
            'path' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'accomodation_id' => 'nullable|exists:accomodations,id',
            'ad_id' => 'nullable|exists:ads,id',
        ]);

        $picture->update($validated);

        return response()->json(['message' => 'Ad updated successfully', 'data' => $picture]);

    }

    public function destroy() {

        $picture = Accomodation::find($id);

        if ($picture) {
            $picture->delete();
            return response()->json(201);
        } else {
            return abort(404);
        }

    }
}
