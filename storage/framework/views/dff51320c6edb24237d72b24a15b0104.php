<header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 sticky top-0 z-10">
    <!-- Search Bar or Context Title -->
    <div class="flex items-center gap-4 w-96">
        <div class="relative w-full">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">🔍</span>
            <input type="text" placeholder="Search invoices, clients, or payments..." class="w-full pl-10 pr-4 py-1.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
        </div>
    </div>

    <!-- Quick Action Board & Stats -->
    <div class="flex items-center gap-6">
        <!-- Live Status Metrics (Optional Dashboard Snippet) -->
        <div class="hidden md:flex items-center gap-4 text-xs font-semibold">
            <span class="flex items-center gap-1.5 px-2.5 py-1 bg-green-50 text-green-700 rounded-full border border-green-200">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> Gateway Live
            </span>
        </div>

        <!-- Quick Create Button -->
        <a href="<?php echo e(route('dashboard.invoices')); ?>" class="flex items-center gap-1.5 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
            <span>➕</span> New Invoice
        </a>

        

        <!-- Logout Action -->
         <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
       <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Sign Out">
                <span>🔔</span> Logout
            </button>
        </form>
        
    </div>
</header>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views/components/navbar.blade.php ENDPATH**/ ?>