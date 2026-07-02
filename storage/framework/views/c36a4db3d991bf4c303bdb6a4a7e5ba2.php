<header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 z-10">
    <!-- Left Section: Title or Search -->
    <div class="flex items-center space-x-4">
        <h2 class="text-xl font-semibold text-gray-800">Billing Overview</h2>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center space-x-6">
        <!-- Quick Action Button -->
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
            + New Invoice
        </button>

        <!-- Profile Dropdown Container -->
        <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-700">
                    <?php echo e(substr(auth()->user()->name ?? 'Admin', 0, 1)); ?>

                </div>
                <span class="text-sm font-medium text-gray-700 hidden md:block">
                    <?php echo e(auth()->user()->name ?? 'Administrator'); ?>

                </span>
            </button>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\components\navigation-board.blade.php ENDPATH**/ ?>