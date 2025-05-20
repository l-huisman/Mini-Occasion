<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class VehicleSearchController extends Controller
{
    public function __invoke()
    {
        $vehicles = Vehicle::query()
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'LIKE', '%' . request('q') . '%');
            })
            ->orWhereHas('type', function ($query) {
                $query->where('name', 'LIKE', '%' . request('q') . '%');
            })
            ->with(['brand', 'type'])
            ->get();

        return view('vehicle.results', ['vehicles' => $vehicles]);
    }
}
