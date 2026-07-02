<aside class="w-64 bg-slate-900 text-slate-200 flex flex-col h-full shadow-xl">
    <!-- Brand / Logo Header Area -->
    <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800">
        <a href="<?php echo e(route('dashboard')); ?>" class="text-xl font-bold tracking-wider text-emerald-400 flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 002-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            <span>Billify Pro</span>
        </a>
    </div>

    <!-- Navigation Module Links -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Core Operations</p>
        
        <!-- Dashboard Link -->
        <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all <?php echo e(request()->routeIs('dashboard') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-200'); ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
            Dashboard
        </a>

        <!-- Invoices Link -->
        <a href="<?php echo e(route('invoices.index')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all <?php echo e(request()->routeIs('invoices.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-200'); ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Invoices
        </a>

        <!-- Clients Link -->
        <a href="<?php echo e(route('clients.index')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all <?php echo e(request()->routeIs('clients.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-200'); ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Clients
        </a>

        <p class="pt-4 px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Management</p>

        <!-- Payments Link -->
        <a href="<?php echo e(route('payments.index')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all <?php echo e(request()->routeIs('payments.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-200'); ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Payments
        </a>
    </nav>

    <!-- Footer Profile Segment -->
    <div class="p-4 border-t border-slate-800 bg-slate-950 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-slate-900 text-xs">
                <?php echo e(substr(auth()->user()->name ?? 'AD', 0, 2)); ?>

            </div>
            <div class="truncate max-w-[120px]">
                <p class="text-xs font-semibold text-slate-200 truncate"><?php echo e(auth()->user()->name ?? 'Admin User'); ?></p>
                <p class="text-[10px] text-slate-500 truncate">Billing Manager</p>
            </div>
        </div>
    </div>
</aside>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\layouts\sidebar.blade.php ENDPATH**/ ?>