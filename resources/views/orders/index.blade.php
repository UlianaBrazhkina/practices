{{-- resources/views/orders/index.blade.php --}}

@extends('layouts.app') {{-- Подключите ваш основной шаблон, если он есть --}}

@section('content')
<div class="container">
    <h1>Мои заказы</h1>

    @if ($orders->isEmpty())
        <p>У вас пока нет заказов.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID заказа</th>
                    <th>Продукт</th>
                    <th>Количество</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
