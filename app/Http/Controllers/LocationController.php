<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('locations.index', [
            'result' => $locations
        ]);
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|max:255',
            'area' => 'required|max:255',
            'address' => 'required|max:255',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        Location::create([
            'city' => $request->city,
            'area' => $request->area,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location Created Successfully');
    }

    public function edit($id)
    {
        $locations = Location::findOrFail($id);

        return view('locations.edit', [
            'result' => $locations
        ]);
    }

    public function update(Request $request, $id)
    {
        $locations = Location::findOrFail($id);

        $request->validate([
            'city' => 'required|max:255',
            'area' => 'required|max:255',
            'address' => 'required|max:255',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        $locations->update([
            'city' => $request->city,
            'area' => $request->area,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location Updated Successfully');
    }

    public function destroy($id)
    {
        $locations = Location::findOrFail($id);

        $locations->delete();

        return redirect()
            ->back()
            ->with('message', 'Location Deleted Successfully');
    }
}
