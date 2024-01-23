<?php

namespace App\Http\Controllers;

use App\Models\Zones;

class PriceListController extends Controller
{
    public function index()
    {
        $zones = Zones::all();
        $zonesGroups = [];
        foreach ($zones as $zone) {
            $zonesGroups[$zone->price][] = $zone->zone;
        }
        ksort($zonesGroups);
        return view('priceList/index', ['zonesGroups' => $zonesGroups]);

    }
}
