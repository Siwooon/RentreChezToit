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
        $ad = Ad::find($id);

        if ($ad) {
            $validated = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|integer'
            ]);
            $ad->update($validated);
        }
        
        else {
            return abort(404);
        }
        return response()->json($ad, 201);
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
