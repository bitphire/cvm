<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index() {
        $vehicles = Vehicle::where('ownership', '=', '1');
        return view('admin.vehicle.index', compact('vehicles'));
    }

    public function create() {
        return view('admin.vehicle.create');
    }

    public function store(Request $request) {
        // Validate
        $validated = $request->validate([
            'purchased_on' => 'required|date',
            'number' => 'required|numeric',
            'state_used_in' => 'required|string|size:2',
            'type' => 'required|string',
            'year' => 'required|numeric',
            'make' => 'required|string',
            'model' => 'required|string',
            'vin' => 'required|alpha_num',
            'license' => 'required|alpha_num',
            'ownership' => 'required|numeric',
        ]);

        $vehicle = new Vehicle();
        $vehicle->purchased_on = $validated['purchased_on'];
        $vehicle->number = $validated['number'];
        $vehicle->state_used_in = $validated['state_used_in'];
        $vehicle->type = $validated['type'];
        $vehicle->year = $validated['year'];
        $vehicle->make = $validated['make'];
        $vehicle->model = $validated['model'];
        $vehicle->vin = $validated['vin'];
        $vehicle->license = $validated['license'];
        $vehicle->ownership = $validated['ownership'];
        $vehicle->save();

        return redirect('/admin/vehicle/list');
    }
}
