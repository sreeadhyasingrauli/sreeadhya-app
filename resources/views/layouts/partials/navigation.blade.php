<header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 shadow-sm">
    <div class="flex items-center">
        <h2 class="text-xl font-semibold text-gray-800">Billing Overview</h2>
    </div>
    <div class="flex items-center space-x-4">
        <button class="text-gray-500 hover:text-gray-700">🔔</button>
        <div class="flex items-center space-x-2 border-l pl-4">
            <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'Manager' }}</span>
        </div>
    </div>
</header>
