<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            // Здесь добавьте ваши правила валидации
            'product_id' => 'required|exists:products,id', // Пример правила
            'quantity' => 'required|integer|min:1',       // Пример правила
        ]);

        // Создание нового заказа
        $order = new Order();
        $order->user_id = auth()->id(); // Устанавливаем ID текущего пользователя
        $order->product_id = $validatedData['product_id']; // Пример присвоения продукта
        $order->quantity = $validatedData['quantity'];     // Пример присвоения количества
        // Присвойте другие необходимые значения здесь

        $order->save(); // Сохранение заказа

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан!');
    }
    public function index()
    {
        // Получаем заказы текущего пользователя
        $orders = Order::where('user_id', auth()->id())->get();
        
        // Возвращаем представление с заказами
        return view('orders.index', compact('orders'));
    }
}
