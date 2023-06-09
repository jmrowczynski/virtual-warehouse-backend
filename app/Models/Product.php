<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity'];

    public function handovers(): HasMany
    {
        return $this->hasMany(Handover::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }

}
