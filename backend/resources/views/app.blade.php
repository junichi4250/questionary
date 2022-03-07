<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>

<body id="app">
    <div class="">
        @yield('content')
    </div>
</body>

</html>
