<?php

namespace Database\Seeders;

use App\Models\backend\ProductTypeOption;
use Illuminate\Database\Seeder;

class ProductTypeOptionSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Normal', 'ordering' => 1],
            ['name' => 'Best Seller', 'ordering' => 2],
            ['name' => 'New Arrival', 'ordering' => 3],
            ['name' => 'Clearance Sale', 'ordering' => 4],
        ];

        foreach ($rows as $row) {
            ProductTypeOption::query()->updateOrCreate(
                ['name' => $row['name']],
                ['ordering' => $row['ordering']]
            );
        }
    }
}
