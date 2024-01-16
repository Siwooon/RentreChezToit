<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomodation;

class AccomodationController extends Controller
{
    public function show($id) {
        $accomodation = Accomodation::find($id);

        return response()->json($accomodation, 201);

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'living_space' => 'required|numeric',
            'land_area' => 'required|integer',
            'description' => 'required|string',
            'garage' => 'nullable|boolean',
            'balcony' => 'nullable|boolean',
            'terrace' => 'nullable|boolean',
            'elevator' => 'nullable|boolean',
            'energetic_class' => 'nullable|string',
            'cave' => 'nullable|boolean'
        ]);

        $accomodation = Accomodation::create($validated);

        return response()->json($accomodation, 201);
    }

    public function update(Request $request, $id) {

        $ad = Ad::findOrFail($id);

        $validatedData = $request->validate([
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'living_space' => 'required|numeric',
            'land_area' => 'required|integer',
            'description' => 'required|string',
            'garage' => 'nullable|boolean',
            'balcony' => 'nullable|boolean',
            'terrace' => 'nullable|boolean',
            'elevator' => 'nullable|boolean',
            'energetic_class' => 'nullable|string',
            'cave' => 'nullable|boolean'
        ]);

        $ad->update($validatedData);

        return response()->json(['message' => 'Ad updated successfully', 'data' => $ad]);
    }

    public function destroy($id) {

        $accomodation = Accomodation::find($id);

        if ($accomodation) {
            $accomodation->delete();
            return response()->json(201);
        } else {
            return abort(404);
        }

    }
}