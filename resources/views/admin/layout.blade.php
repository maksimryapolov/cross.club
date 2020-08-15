<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Административная панель</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="container nav-block">
            <div>
                <a href="{{ route('admin') }}" class="nav-link">
                    Административная панель
                </a>
            </div>
            <div>
                <a href="{{ route('admin.cabinet.create') }}" class="nav-link">
                    Добавить товар
                </a>
            </div>
            <div>
                <a href="{{ route('admin.offers.create') }}" class="nav-link">
                    Добавить предложение
                </a>
            </div>
            <div class="nav-item">
                <img src="{{ asset('images/svg/undo.svg') }}" alt="back">
                <a class="nav-link" href="/">На сайт</a>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>