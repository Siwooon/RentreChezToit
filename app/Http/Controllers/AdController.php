<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function show($id)
    {
        $ad = Ad::find($id);
        return response()->json($ad, 201);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer'
        ]);

        $ad = Ad::create($validated);

        return response()->json($ad, 201);
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        // Validez les champs que vous souhaitez mettre à jour
        $validatedData = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            // Ajoutez d'autres règles de validation au besoin...
        ]);

        // Appliquez les modifications au modèle Ad
        $ad->update($validatedData);

        return response()->json(['message' => 'Ad updated successfully', 'data' => $ad]);
    }
    
    public function destroy($id)
    {
        $ad = Ad::find($id);

        if ($ad) {
            $ad->delete();
            return response()->json(201);
        } else {
            return abort(404);
        }
    }
}
