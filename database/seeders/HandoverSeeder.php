<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Handover;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Handover::factory()->for(Product::factory())->for(Employee::factory())->count(5)->create();
    }
}
