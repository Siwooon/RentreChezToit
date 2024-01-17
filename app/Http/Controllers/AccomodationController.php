<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Accomodation;

class AccomodationController extends Controller
{
    public function show($id) {
        $accomodation = Accomodation::find($id);
        $imagePaths = glob(public_path("storage/accomodation_images/{$id}/*"));
        // dd($imagePaths);
        $images = [];
        foreach ($imagePaths as $imagePath) {
            $images[] = asset($imagePath);
        }
        $accomodation->images = $images;
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
            'cave' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {

            $accomodation = Accomodation::create($validated); // Créez l'accommodation pour obtenir son ID
            $accomodationId = $accomodation->id;
            
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store("public/accomodation_images/{$accomodationId}");
            }

            // Mettez à jour le champ 'images' dans la base de données
            $accomodation->update(['images' => "public/accomodation_images/{$accomodationId}"]);

            return response()->json($accomodation, 201);
        }
        else {
            $accomodation = Accomodation::create($validated);
        }
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
                'cave' => 'nullable|boolean',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $accomodation->update($validated);

            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $image->store("public/accomodation_images/{$id}");
                }
                return response()->json($accomodation, 201);
            }
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
            Storage::deleteDirectory("public/accomodation_images/{$id}");
            return response()->json(201);
        } else {
            return abort(404);
        }

    }
}