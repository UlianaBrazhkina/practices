<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Если у вас есть стили -->
</head>
<body>

<div class="container">
    <h1>Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Имя" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
            <input type="password" name="password" placeholder="Пароль" required>
        </div>
        <div>
            <input type="password" name="password_confirmation" placeholder="Подтверждение пароля" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>

</body>
</html>
