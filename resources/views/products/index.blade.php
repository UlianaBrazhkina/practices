<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список продуктов</title>
</head>
<body>
    <h1>Список продуктов</h1>
    <a href="{{ route('products.create') }}">Добавить новый продукт</a>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}₽</li>
        @endforeach
    </ul>
</body>
</html>
