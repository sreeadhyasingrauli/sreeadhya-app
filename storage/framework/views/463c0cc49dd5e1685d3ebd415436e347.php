<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing App</title>

    <!-- Vite Blade Directive -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
</head>
<body class="bg-blue-100 font-sans antialiased">
    
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
         <aside class="w-64 bg-slate-900 text-black flex flex-col flex-shrink-0">
         
            <div class="p-5 font-bold text-xl tracking-wider border-b border-indigo-800">
                ⚡ BillFlow Admin
            </div>
            
                <nav class="flex-1 p-4 space-y-2">
                <a href="/dashboard" class="block py-2.5 px-4 rounded transition bg-indigo-800 text-black">📊 Dashboard</a>
                <a href="/companies" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition"> Companies</a>
                <a href="/customers" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition"> Customers</a>
                <a href="/products" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition"> Products</a>
                <a href="/offers" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition">Budgetary Offers</a>
                <a href="/purchase-orders" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition"> Purchase Orders</a>
                <a href="/invoices" class="block px-4 py-2.5 rounded text-slate-300 hover:bg-slate-800 hover:text-white transition"> Invoices</a>
                
     
            </nav>
            
            <!-- Sidebar Footer -->
            
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Header Top Bar -->
            <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800"><?php echo e($header ?? 'Dashboard'); ?></h1>
                <div class="text-sm font-medium text-gray-600">User: <?php echo e(auth()->user()->name ?? 'Admin'); ?></div>
            </header>

            <!-- Dashboard Inner Content -->
            <main class="p-6">
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\components\layouts\app.blade.php ENDPATH**/ ?>