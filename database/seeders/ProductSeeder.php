<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ["name" => "Orange", "cost" => 50000000, "amount" => 27],
            ["name" => "Banana", "cost" => 120000000, "amount" => 17],
            ["name" => "Bread", "cost" => 70000000, "amount" => 0],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => 'Description of ' . $product['name'], // Добавляем описание
                'price' => $product['cost'] / 100, // Предполагая, что цена хранится в минимальных единицах
            ]);
        }
    }
}
