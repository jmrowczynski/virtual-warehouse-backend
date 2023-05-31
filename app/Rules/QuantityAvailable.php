<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class QuantityAvailable implements ValidationRule
{
    private $productId;
    private $quantity;

    public function __construct($productId, $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Product::find($this->productId);
        if (!($product && $product->quantity >= $this->quantity)) {
            $fail('The product does not have enough quantity.')->translate();
        }
    }
}
