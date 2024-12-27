<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white px-4 py-2">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">Employee Management</h1>
                <ul class="flex space-x-4 justify-center items-center ">
                    <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                    <li><a href="{{ route('presensi.index') }}" class="hover:underline">Input Kehadiran</a></li>
                    <li><a href="{{ route('input.izin') }}" class="hover:underline">Input Izin</a></li>
                    <li><a href="{{ route('input.lembur') }}" class="hover:underline">Input Lembur</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="flex justify-center items-center m-0 p-0">
                            @csrf
                            <button type="submit" class="hover:underline flex justify-center items-center">Logout</button>
                        </form>
                     </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-grow container mx-auto p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
