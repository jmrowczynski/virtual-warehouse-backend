<?php

namespace App\Http\Controllers;

use App\Models\Handover;
use App\Models\Product;
use App\Rules\QuantityAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandoverController extends Controller
{
    public function index(Request $request)
    {

        $handovers = DB::table('handovers')->latest();

        return $handovers->paginate(10);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'quantity' => ['required', 'integer', 'gte:1', new QuantityAvailable($request->product_id, $request->quantity)],
            'employee_id' => 'required|exists:employees,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $handover = Handover::create([
            'quantity' => $params['quantity'],
            'employee_id' => $params['employee_id'],
            'product_id' => $params['product_id']
        ]);

        $product = Product::find($params['product_id']);
        $product->quantity -= $params['quantity'];
        $product->save();

        return $handover;
    }
}
