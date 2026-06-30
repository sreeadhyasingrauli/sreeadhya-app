<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Billing System' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js for interactive sidebar toggles -->
    <script defer src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        <x-sidebar />

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <!-- Top Navigation Board -->
            <x-navbar />

            <!-- Page Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
