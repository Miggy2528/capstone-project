<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ButcherPro Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-red-700 text-white p-4">
            <h1 class="text-xl font-bold">ButcherPro Admin Panel</h1>
        </header>

        <div class="flex flex-1">
            <aside class="w-64 bg-white shadow p-4">
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="#">Inventory</a>
                    <a href="#">Orders</a>
                    <a href="#">Customers</a>
                    <a href="#">Reports</a>
                </nav>
            </aside>

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
