<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function order(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $totalAmount = $product->price * $request->quantity;

        Order::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->back()->with('success', 'Заказ успешно создан!');
    }
    public function create()
    {
        return view('products.create'); // Создайте Blade-шаблон products/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index'); // Перенаправление на страницу со списком продуктов
    }
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}
}
