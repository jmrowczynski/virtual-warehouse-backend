<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (config('app.default_user_password')) {
             \App\Models\User::factory()->create([
                 'name' => 'Jakub Mrówczyński',
                 'email' => 'jmrowczynski12@gmail.com',
                 'password' => bcrypt(config('app.default_user_password'))
             ]);
        }

        $this->call(ProductSeeder::class);
//        $this->call(EmployeeSeeder::class);
//        $this->call(ReceiptSeeder::class);
//        $this->call(HandoverSeeder::class);

    }
}
