<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>

<body id="app">
    <div class="bg-gray-200 py-32 px-10 min-h-screen ">
        @yield('content')
    </div>
</body>

</html>
