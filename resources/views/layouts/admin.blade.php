<!DOCTYPE html>
<html>
<head>
    <title>ButcherPro Admin</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('admin.partials.nav')
    <main class="container mt-4">@yield('content')</main>
</body>
</html>
