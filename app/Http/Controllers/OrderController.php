<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderCalculation;
use App\Models\CalculationResults;

class OrderController extends Controller
{
    public function index()
    {
        return view('Order/index');
    }

    public function calculate(Request $request, OrderCalculation $orderCalculation)
    {
        $request->validate([
            'postcode' => 'required|digits:5',
            'total_amount' => 'required|integer',
        ]);
        $result = $orderCalculation->calculate($request->except('_token'));
        CalculationResults::insert($result);

        return redirect()->route('order')->with('value', $result['value']);

    }
}
