<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Handover;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->has(Receipt::factory())->has(Handover::factory()->for(Employee::factory()))->count(50)->create();
    }
}
