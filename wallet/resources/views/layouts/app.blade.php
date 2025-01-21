<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Manager</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-500 text-white py-4 shadow-md">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Transaction Manager</h1>
                <nav>
                    <a href="" class="text-white hover:underline px-3">Accounts</a>
                    <a href="" class="text-white hover:underline px-3">Transactions</a>
                    <a href="" class="text-white hover:underline px-3">Categories</a>
                    <a href="" class="text-white hover:underline px-3">Budgets</a>
                    <a href="" class="text-white hover:underline px-3">Reports</a>
                </nav>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-grow container mx-auto px-4 py-6">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-400 py-4 mt-auto">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; {{ date('Y') }} Transaction Manager. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
