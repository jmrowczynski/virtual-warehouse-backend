<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $request->validate([
            'name' => 'string|nullable',
            'price_min' => 'numeric|nullable',
            'price_max' => 'numeric|nullable',
            'quantity_min' => 'numeric|nullable',
            'order_by' => 'in:name,quantity_min,quantity_max|nullable',
        ]);

        $orderKey = 'name';
        $orderDirection = 'asc';

        $request->whenFilled('order_by', function ($order_by) use (&$orderKey, &$orderDirection) {
            if ($order_by === 'quantity_min') {
                $orderKey = 'quantity';
                $orderDirection = 'asc';
            }

            if ($order_by === 'quantity_max') {
                $orderKey = 'quantity';
                $orderDirection = 'desc';
            }
        });

        $products = DB::table('products')->orderBy($orderKey, $orderDirection);

        $request->whenFilled('name', function ($name) use ($products) {
            $products->where('name', 'like', '%'. $name. '%');
        });

        $request->whenFilled('price_min', function ($price_min) use ($products) {
            $products->where('price', '>=', $price_min);
        });

        $request->whenFilled('price_max', function ($price_max) use ($products) {
            $products->where('price', '<=', $price_max);
        });

        return $products->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
