<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>@yield('title')</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <header>@include('header')</header>
        <br />
        <div class="container">@yield('content')</div>
        <footer class="footer bg-dark fixed-bottom">@include('footer')</footer>
    </body>
</html>
