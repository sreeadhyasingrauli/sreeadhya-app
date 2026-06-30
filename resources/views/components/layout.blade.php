<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Billing System' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <!-- FontAwesome for billing icons -->
    <link href="https://cloudflare.com" rel="stylesheet">
    <style>
        body { overflow-x: hidden; background-color: #f8f9fa; }
        .wrapper { display: flex; width: 100%; align-items: stretch; }
        #sidebar { min-width: 260px; max-width: 260px; min-height: 100vh; background: #1e293b; color: #fff; transition: all 0.3s; }
        #sidebar .sidebar-header { padding: 20px; background: #0f172a; }
        #sidebar ul p { color: #64748b; padding: 10px 20px 0 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; }
        #sidebar ul li a { padding: 12px 20px; font-size: 1rem; display: block; color: #cbd5e1; text-decoration: none; display: flex; align-items: center; gap: 12px; }
        #sidebar ul li a:hover, #sidebar ul li.active > a { color: #fff; background: #334155; }
        #content { width: 100%; }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar Component -->
    <x-sidebar />

    <div id="content">
        <!-- Navbar Component -->
        <x-navbar />

        <!-- Main Dynamic Content Context -->
        <div class="container-fluid p-4">
            {{ $slot }}
        </div>
    </div>
</div>

<script src="https://jsdelivr.net"></script>
</body>
</html>
