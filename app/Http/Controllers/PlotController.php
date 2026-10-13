<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function createPlot(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:plots,name',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'water_rate' => 'required|double',
            'meter_number' => 'required|string|unique:plots,meter_number',
            'location_id' => 'required|integer|exists:locations,id'
        ]);

        $plot = new Plot();
        $plot->name = $validated['name'];
        $plot->longitude = $validated['longitude'];
        $plot->latitude = $validated['latitude'];
        $plot->water_rate = $validated['water_rate'];
        $plot->meter_number = $validated['meter_number'];
        $plot->location_id = $validated['location_id'];

    }
}
