<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 shadow-sm">
    <!-- Context Indicator / Search Panel -->
    <div class="flex items-center gap-4">
        <span class="text-sm font-semibold text-gray-500">Workspace: <strong class="text-gray-800">Global Billing</strong></span>
        <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-1.5 border border-gray-200">
            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search Invoices, Quick IDs..." class="bg-transparent border-none text-xs focus:outline-none w-64 text-gray-700">
        </div>
    </div>

    <!-- Quick Actions and Alerts -->
    <div class="flex items-center gap-4">
        <!-- Action Button -->
        <a href="<?php echo e(route('invoices.create')); ?>" class="hidden sm:flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-3 py-2 rounded-lg font-medium shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Invoice
        </a>

        <!-- System Logout -->
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="p-2 text-gray-400 hover:text-rose-600 rounded-lg transition-colors" title="Sign Out">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
        </form>
    </div>
</header>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\layouts\navigation.blade.php ENDPATH**/ ?>