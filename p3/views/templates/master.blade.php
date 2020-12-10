<!doctype html>
<html lang='en'>

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link href='/css/app.css' rel='stylesheet'> @yield('head')

</head>

<body>

    <header>
        <img id='logo' src='/images/RPS.jpg' alt='Rock, Paper, Scissors'>

    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>

</html>