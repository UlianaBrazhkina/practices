<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить продукт</title>
</head>
<body>
    <h1>Добавить продукт</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
