<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category' => 'Cardiologist',
                'image' => '1678523523.png',
            ],
            [
                'category' => 'Neurology',
                'image' => '1678523474.png',
            ],
            [
                'category' => 'Dentist',
                'image' => '1678523096.png',
            ],
            [
                'category' => 'Urology',
                'image' => '1678523160.png',
            ],
        ];
        Category::insert($data);
    }
}
