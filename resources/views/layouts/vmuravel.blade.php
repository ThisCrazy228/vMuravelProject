<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

    <div style="min-height: 100vh; position: relative;">
        @include('include.header')

        @include('include.notifications')

        @yield('content')

        {{--  Код ниже исправляет проблему с футером и списком постов/категорий  --}}
        @for($i = 0; $i < 4; $i++)
        <br>
        @endfor

        @include('include.footer')
    </div>

</body>
</html>
