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


        // $validated = $request->validate([
        //     'address' => 'required|string',
        //     'bedrooms' => 'required|integer',
        //     'bathrooms' => 'required|integer',
        //     'living_space' => 'required|numeric',
        //     'land_area' => 'required|integer',
        //     'description' => 'required|string',
        //     'garage' => 'nullable|boolean',
        //     'balcony' => 'nullable|boolean',
        //     'terrace' => 'nullable|boolean',
        //     'elevator' => 'nullable|boolean',
        //     'energetic_class' => 'nullable|string',
        //     'cave' => 'nullable|boolean'
        // ]);

        // $accomodation = Accomodation::create($validated);

        // return response()->json($accomodation, 201);

        $validated = $request->validate([
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'living_space' => 'required|numeric',
            // 'land_area' => 'required|integer',
            'description' => 'required|string',
            // 'garage' => 'nullable|boolean',
            // 'balcony' => 'nullable|boolean',
            // 'terrace' => 'nullable|boolean',
            // 'elevator' => 'nullable|boolean',
            // 'energetic_class' => 'nullable|string',
            // 'cave' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            $accomodation = Accomodation::create($validated); // Créez l'accommodation pour obtenir son ID
            $accomodationId = $accomodation->id;
    
            foreach ($request->file('images') as $image) {
                $imagePath = $image->storeAs("accomodation_images/{$accomodationId}", $image->getClientOriginalName(), 'public');
                $imagePaths[] = $imagePath;
            }
    
            // Mettez à jour le champ 'images' dans la base de données
            $accomodation->update(['images' => $imagePaths]);
        }
        else {
            $accomodation = Accomodation::create($validated);
        }
        return response()->json($accomodation, 201);
    }

    public function update(Request $request, $id) {
        $accomodation = Accomodation::find($id);

        if ($accomodation) {
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
            $accomodation->update($validated);
        }

        else {
            return abort(404);
        }
        
        return response()->json($accomodation, 201);
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