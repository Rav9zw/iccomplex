<?php

namespace App\Http\Controllers;

use App\Models\CalculationResults;
use App\Models\Zones;
use Illuminate\Http\Request;

class CalculatedListController extends Controller
{
    public function index()
    {

        $data = [];
        $i = 0;
        foreach (CalculationResults::all() as $result) {
            $data[$i]['postcode'] = $result->postcode;
            $data[$i]['price'] = $result->price;
            $data[$i]['total_amount'] = $result->total_amount;
            $data[$i]['long_product'] = $result->long_product;
            $data[$i]['discount_applied'] = $result->discount_applied;
            $data[$i]['value'] = $result->value;
            $i++;
        }

        return view('calculatedList/index', ['data' => $data]);

    }
}
